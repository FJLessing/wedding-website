<template>
  <b-container tag="main">
    <b-row>
      <b-col cols="8" md="4" offset="2" offset-md="4">
        <img class="img-fluid m-auto" src="/img/rsvp/header.png" />
      </b-col>
    </b-row>
    <b-form @submit="submit" class="rsvp-form pb-5">
      <b-row>
          <b-col cols="8" md="4" offset="2" offset-md="4">
              <b-form-group label="name" label-for="name">
                <b-form-input id="name" v-model="form.name" required></b-form-input>
              </b-form-group>
          </b-col>
      </b-row>
      <b-form-radio-group
        class="my-5 rsvp-radio-group"
        v-model="form.attending"
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
      <b-form-radio-group v-if="form.attending === 'yes'" class="my-5 rsvp-radio-group" id="dietary-prefrences">
        <b-form-checkbox class="rsvp-checkbox" v-model="form.dietary" value="vegan">lamb</b-form-checkbox>
        <b-form-checkbox class="rsvp-checkbox" v-model="form.dietary" value="vegetarian">vegetarian</b-form-checkbox>
      </b-form-radio-group>
      <b-row v-if="form.attending">
        <b-col cols="8" md="4" offset="2" offset-md="4">
          <b-form-group label="notes">
            <b-form-textarea id="notes" v-model="form.notes" rows="3"></b-form-textarea>
          </b-form-group>
        </b-col>
      </b-row>
      <b-row v-if="form.attending" class="my5">
        <b-col cols="8" offset="2">
          <b-button type="submit" variant="primary" class="text-white">Submit</b-button>
        </b-col>
      </b-row>
    </b-form>
  </b-container>
</template>

<script>
import axios from 'axios';

export default {
  name: 'rsvp',
  data () {
    return {
      form: {
        name: '',
        attending: null,
        dietary: 'lamb',
        notes: ''
      }
    }
  },

  methods: {
    submit () {
      const data = {
        name: this.name,
        attending: this.attending,
        dietary: this.dietary,
        notes: this.notes
      }
      axios.post('/api/rsvp', data)
        .then(response => {
          console.log(response)
        })
        .catch(error => {
          console.log(error)
        })
    }
  },

  mounted () {
    console.log(this.$route);
    this.form.name = this.$route.query.name || '';
  }
}
</script>

<style lang="scss">
.rsvp-form {
  input[type="text"],
  input[type="textarea"],
  textarea {
    border-top: 0;
    border-left: 0;
    border-right: 0;

    &:focus {
      outline: 0;
      box-shadow: none;
      border-bottom-width: 5px;
    }
  }
}

.rsvp-radio-group {
  display: flex;
  justify-content: center;

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
