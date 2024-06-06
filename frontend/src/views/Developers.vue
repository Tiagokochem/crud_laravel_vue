<template>
  <v-container>
    <v-card>
      <v-card-title>
        Developers
        <v-spacer></v-spacer>
        <v-btn @click="openDialog" color="primary">Add Developer</v-btn>
      </v-card-title>
      <v-data-table :headers="headers" :items="developers">
        <template v-slot:item.actions="{ item }">
          <v-icon small @click="editDeveloper(item)">mdi-pencil</v-icon>
          <v-icon small @click="deleteDeveloper(item)">mdi-delete</v-icon>
        </template>
      </v-data-table>
    </v-card>

    <v-dialog v-model="dialog" max-width="500px">
      <v-card>
        <v-card-title>
          <span class="headline">{{ formTitle }}</span>
        </v-card-title>
        <v-card-text>
          <v-form ref="form">
            <v-text-field v-model="developer.name" label="Name" required></v-text-field>
            <v-text-field v-model="developer.gender" label="Gender" required></v-text-field>
            <v-text-field v-model="developer.date_of_birth" label="Date of Birth" required></v-text-field>
            <v-text-field v-model="developer.hobby" label="Hobby" required></v-text-field>
            <v-select v-model="developer.level_id" :items="levels" item-text="level" item-value="id" label="Level" required></v-select>
          </v-form>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" text @click="closeDialog">Cancel</v-btn>
          <v-btn color="blue darken-1" text @click="saveDeveloper">Save</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>

    <v-dialog v-model="confirmDialog" max-width="290">
      <v-card>
        <v-card-title class="headline">Are you sure?</v-card-title>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" text @click="closeConfirmDialog">Cancel</v-btn>
          <v-btn color="blue darken-1" text @click="confirmDelete">Confirm</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-container>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      headers: [
        { text: 'ID', value: 'id' },
        { text: 'Name', value: 'name' },
        { text: 'Gender', value: 'gender' },
        { text: 'Date of Birth', value: 'date_of_birth' },
        { text: 'Hobby', value: 'hobby' },
        { text: 'Level', value: 'level.level' },
        { text: 'Actions', value: 'actions', sortable: false }
      ],
      developers: [],
      levels: [],
      dialog: false,
      confirmDialog: false,
      formTitle: '',
      developer: {},
      developerToDelete: null
    };
  },
  methods: {
    async fetchDevelopers() {
      try {
        const response = await axios.get('http://localhost:1002/api/developers');
        this.developers = response.data;
      } catch (error) {
        console.error(error);
      }
    },
    async fetchLevels() {
      try {
        const response = await axios.get('http://localhost:1002/api/levels');
        this.levels = response.data;
      } catch (error) {
        console.error(error);
      }
    },
    openDialog() {
      this.dialog = true;
      this.formTitle = 'Add Developer';
      this.developer = {};
    },
    closeDialog() {
      this.dialog = false;
    },
    async saveDeveloper() {
      try {
        if (this.developer.id) {
          await axios.put(`http://localhost:1002/api/developers/${this.developer.id}`, this.developer);
        } else {
          await axios.post('http://localhost:1002/api/developers', this.developer);
        }
        this.fetchDevelopers();
        this.dialog = false;
      } catch (error) {
        console.error(error);
      }
    },
    editDeveloper(developer) {
      this.developer = { ...developer };
      this.dialog = true;
      this.formTitle = 'Edit Developer';
    },
    deleteDeveloper(developer) {
      this.developerToDelete = developer;
      this.confirmDialog = true;
    },
    closeConfirmDialog() {
      this.confirmDialog = false;
    },
    async confirmDelete() {
      try {
        await axios.delete(`http://localhost:1002/api/developers/${this.developerToDelete.id}`);
        this.fetchDevelopers();
        this.confirmDialog = false;
      } catch (error) {
        console.error(error);
      }
    }
  },
  mounted() {
    this.fetchDevelopers();
    this.fetchLevels();
  }
};
</script>
