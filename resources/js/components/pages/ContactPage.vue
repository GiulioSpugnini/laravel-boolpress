<template>
  <section>
    <h2 class="mt-3">Contattaci</h2>
    <Loader v-if="isLoading" />
    <div v-else>
      <Alert v-if="hasErrors || alertMessage" type="success">
        <div>{{ alertMessage }}</div>
        <ul v-if="hasErrors">
          <li v-for="(error, key) in errors" :key="key">{{ error }}</li>
        </ul>
      </Alert>
      <form>
        <div class="form-group">
          <label for="email">Email:</label>
          <input
            type="email"
            class="form-control"
            id="email"
            v-model="form.email"
          />
          <small class="form-text text-muted">Inserisci la tua email</small>
        </div>

        <div class="form-group">
          <label for="message">Messaggio:</label>
          <textarea
            class="form-control"
            id="message"
            rows="10"
            v-model="form.message"
          ></textarea>
        </div>
        <div class="d-flex justify-content-end align-items-center">
          <button class="btn btn-primary" @click="sendForm">Invia</button>
        </div>
      </form>
    </div>
  </section>
</template>

<script>
import Alert from "../posts/Alert.vue";
import Loader from "../Loader.vue";
export default {
  name: "ContactPage",
  components: {
    Alert,
    Loader,
  },
  data() {
    return {
      form: {
        email: "",
        message: "",
      },
      errors: {},
      alertMessage: "",
      isLoading: false,
    };
  },
  computed: {
    hasErrors() {
      return Object.keys(this.errors).length;
    },
  },
  methods: {
    sendForm() {
      const errors = {};
      if (!this.form.email.trim()) errors.email = "La mail è obbligatoria";
      if (!this.form.message.trim()) errors.message = "La mail è obbligatoria";
      if (this.form.email.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/))
        errors.email = "La mail non è valida";
      this.isloading = true;
      axios
        .post("http://localhost:8000/api/messages", this.form)
        .then((res) => {
          this.form.email = "";
          this.form.message = "";
          this.alertMessage = "Messaggio inviato con successo";
        })
        .catch((err) => {
          this.errors = { error: "Si è verificato un errore" };
        })
        .then(() => {
          this.isloading = false;
        });
    },
  },
};
</script>

<style>
</style>