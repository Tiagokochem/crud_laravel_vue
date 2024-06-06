<template>
  <v-container>
    <v-card>
      <v-card-title>
        Levels
        <v-spacer></v-spacer>
        <v-btn @click="openDialog" color="primary">Add Level</v-btn>
      </v-card-title>
      <v-data-table :headers="headers" :items="levels">
        <template v-slot:item.actions="{ item }">
          <v-icon small @click="editLevel(item)">mdi-pencil</v-icon>
          <v-icon small @click="deleteLevel(item)">mdi-delete</v-icon>
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
            <v-text-field v-model="level.level" label="Level" required></v-text-field>
          </v-form>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" text @click="closeDialog">Cancel</v-btn>
          <v-btn color="blue darken-1" text @click="saveLevel">Save</v-btn>
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
        { text: 'Level', value: 'level' },
        { text: 'Actions', value: 'actions', sortable: false }
      ],
      levels: [],
      dialog: false,
      confirmDialog: false,
      formTitle: '',
      level: {},
      levelToDelete: null
    };
  },
  methods: {
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
      this.formTitle = 'Add Level';
      this.level = {};
    },
    closeDialog() {
      this.dialog = false;
    },
    async saveLevel() {
      try {
        if (this.level.id) {
          await axios.put(`http://localhost:1002/api/levels/${this.level.id}`, this.level);
        } else {
          await axios.post('http://localhost:1002/api/levels', this.level);
        }
        this.fetchLevels();
        this.dialog = false;
      } catch (error) {
        console.error(error);
      }
    },
    editLevel(level) {
      this.level = { ...level };
      this.dialog = true;
      this.formTitle = 'Edit Level';
    },
    deleteLevel(level) {
      this.levelToDelete = level;
      this.confirmDialog = true;
    },
    closeConfirmDialog() {
      this.confirmDialog = false;
    },
    async confirmDelete() {
      try {
        await axios.delete(`http://localhost:1002/api/levels/${this.levelToDelete.id}`);
        this.fetchLevels();
        this.confirmDialog = false;
      } catch (error) {
        console.error(error);
      }
    }
  },
  mounted() {
    this.fetchLevels();
  }
};
</script>
