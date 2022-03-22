<template>
  <main class="rsvp">
    <b-container class="rsvp" tag="main">
      <b-row>
        <b-col cols="8" md="4" offset="2" offset-md="4">
          <img class="img-fluid m-auto" src="/img/rsvp/header.webp" />
        </b-col>
      </b-row>
    </b-container>

    <b-container v-if="!submitted">
      <b-form @submit.stop.prevent class="rsvp-form pb-5" :validated="formValid">
        <b-row>
            <b-col cols="8" md="4" offset="2" offset-md="4">
                <b-form-group label="name" label-for="name" :state="nameNotEmpty">
                  <b-form-input id="name" v-model="form.name" required @blur="touchForm"></b-form-input>
                  <b-form-invalid-feedback :state="nameNotEmpty">please enter your name</b-form-invalid-feedback>
                </b-form-group>
            </b-col>
        </b-row>
        <b-form-radio-group
          class="my-5 rsvp-radio-group"
          v-model="form.attending"
          :state="attendingSelected"
          required
        >
          <b-form-checkbox class="rsvp-checkbox" value="yes" v-model="form.attending">happily accept</b-form-checkbox>
          <b-form-checkbox class="rsvp-checkbox" value="no" v-model="form.attending">regretfully decline</b-form-checkbox>
        </b-form-radio-group>
        <b-row v-if="form.attending === 'yes'">
          <b-col cols="8" md="4" offset="2" offset-md="4">
            <label class="form-title" for="dietary-prefrences">dietary preferences:</label>
          </b-col>
        </b-row>
        <b-form-radio-group v-if="form.attending === 'yes'" class="my-5 rsvp-radio-group" id="dietary-prefrences" :state="dietarySelected">
          <b-form-checkbox class="rsvp-checkbox" v-model="form.dietary" value="lamb">lamb</b-form-checkbox>
          <b-form-checkbox class="rsvp-checkbox" v-model="form.dietary" value="vegetarian">vegetarian</b-form-checkbox>
        </b-form-radio-group>
        <b-row v-if="form.attending" class="mb-3">
          <b-col cols="8" md="4" offset="2" offset-md="4">
            <b-form-group label="notes">
              <b-form-input v-model="form.notes"></b-form-input>
              <b-form-text>(optional) 'n boodskap vir die bruidspaar</b-form-text>
            </b-form-group>
          </b-col>
        </b-row>
        <b-row v-if="errors.length > 0">
          <b-col cols="8" md="4" offset="2" offset-md="4">
            <b-form-group>
                    <b-form-invalid-feedback v-for="(error, i) in errors" :state="false" v-bind:key="'error' + i">
                      {{ error }}
                    </b-form-invalid-feedback>
            </b-form-group>
          </b-col>
        </b-row>
        <b-row v-if="form.attending" class="my5">
          <b-col cols="8" offset="2">
            <b-button variant="primary" class="text-white" @click="onSubmit">Submit</b-button>
          </b-col>
        </b-row>
      </b-form>
    </b-container>

    <b-container v-else class="py-5">
      <b-row>
        <b-col cols="8" md="4" offset="2" offset-md="4">
          <p>Thank you for letting us know! </p>
          <p>{{ (form.attending === "yes") ? 'We look forward to seeing you!' : 'We\'re sorry to hear you can\'t make it.' }}</p>
        </b-col>
      </b-row>
      <b-row>
        <b-col class="text-center">
          <b-button variant="outline-secondary" outline @click="resetForm">RSVP for your partner</b-button>
          <router-link to="location#booking"  class="btn btn-primary text-white ml-4"><b>Book your room</b></router-link>
        </b-col>
      </b-row>
    </b-container>
  </main>
</template>

<script>
import axios from 'axios';

export default {
  name: 'rsvp',
  data () {
    return {
      formNotTouched: true,
      form: {
        name: '',
        attending: null,
        dietary: 'lamb',
        notes: ''
      },
      submitted: false,
      errors: []
    }
  },

  methods: {
    onSubmit (event) {
      event.preventDefault();

      const data = {
        name: this.form.name,
        attending: this.form.attending,
        dietary: this.form.dietary,
        notes: this.form.notes
      }
      if (this.form.name === '' || this.form.attending === null) {
        this.errors.push('please enter your name');
        this.formNotTouched = false;
        return;
      }

      axios.post('/forms/rsvp-submit.php', data)
        .then(response => {
          console.log(response)
          this.submitted = true;
          this.errors = [];
        })
        .catch(error => {
          this.submitted = true;

          this.errors = (error.response && error.response.data) ? JSON.parse(error.response.data) : [];
          this.errors.push('We\'re sorry but something went wrong! Please try again later.');
          this.$bvToast.toast("There has been an error with your submission, please check the details and try again.", {
            title: 'Failed',
            variant: 'danger',
            solid: true,
            appendToast: true,
            autoHideDelay: 3000
          });
        })
    },

    resetForm () {
      this.form = {
        name: '',
        attending: null,
        dietary: 'lamb',
        notes: ''
      };
      this.formNotTouched = true;
      this.submitted = false;
    },

    touchForm () {
      this.formNotTouched = false;
    }
  },

  computed: {

    nameNotEmpty () {
      if (!this.formTouched) {
        return null;
      }
      return (this.form.name.length > 0) && (this.form.name === null || this.form.name.match(/^ *$/) !== null);
    },

    attendingSelected () {
      return this.form.attending !== null;
    },

    dietarySelected () {
      return (!this.attendingSelected) && this.form.dietary !== '';
    },

    formValid () {
      if (this.formNotTouched) return null;
      return this.nameNotEmpty && this.attendingSelected;
    }
  },

  mounted () {
    if (this.$route.query.name) {
      this.form.name = this.$route.query.name || '';
      this.form.attending = 'yes';
      this.form.dietary = 'lamb';
      this.form.notes = 'Inge is cool';
    }
  }
}
</script>

<style lang="scss">
@import '@/styles/common/_bootstrap-variables.scss';

.rsvp-radio-group {
  display: flex;
  justify-content: center;

  @media screen and (max-width: map-get($grid-breakpoints, md)) {
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;

    .rsvp-checkbox {
      margin-bottom: 1rem;
      margin-left: 3rem
    }
  }

  .rsvp-checkbox {
    align-content: center;

    &:first-child {
      margin-right: 3rem;
    }

    .custom-control-input {
      background-size: cover;
      width: 2rem;
      height: 2rem;
    }

    .custom-control-label {
      line-height: 2.5rem;
      padding-left: 1.5rem;

      &::before,
      &::after {
        width: 2rem;
        height: 2rem;
        line-height: 2rem;
        margin-right: 2rem;
      }
    }
  }
}

</style>
