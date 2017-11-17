<template>
  <card :title="$t('your_info')">
    <form @submit.prevent="create" @keydown="form.onKeydown($event)">
      <alert-success :form="form" :message="$t('Client created!!')"></alert-success>

      <!-- Name -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('First Name') }}</label>
        <div class="col-md-7">
          <input v-model="form.first_name" type="text" name="first_name" class="form-control"
            :class="{ 'is-invalid': form.errors.has('first_name') }">
          <has-error :form="form" field="first_name"></has-error>
        </div>
      </div>

      <!-- Last Name -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('Last name') }}</label>
        <div class="col-md-7">
          <input v-model="form.last_name" type="text" name="last_name" class="form-control"
                 :class="{ 'is-invalid': form.errors.has('last_name') }">
          <has-error :form="form" field="last_name"></has-error>
        </div>
      </div>

      <!-- DOB -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('DOB') }}</label>
        <div class="col-md-7">
          <input v-model="form.dob" type="text" name="dob" class="form-control"
                 :class="{ 'is-invalid': form.errors.has('dob') }">
          <has-error :form="form" field="dob"></has-error>
        </div>
      </div>

      <!-- Email -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('email') }}</label>
        <div class="col-md-7">
          <input v-model="form.email" type="email" name="email" class="form-control"
            :class="{ 'is-invalid': form.errors.has('email') }">
          <has-error :form="form" field="email"></has-error>
        </div>
      </div>

      <!-- mobile -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('Mobile') }}</label>
        <div class="col-md-7">
          <input v-model="form.mobile" type="text" name="mobile" class="form-control"
                 :class="{ 'is-invalid': form.errors.has('mobile') }">
          <has-error :form="form" field="mobile"></has-error>
        </div>
      </div>


      <!-- nationality -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('nationality') }}</label>
        <div class="col-md-7">
          <input v-model="form.nationality" type="text" name="nationality" class="form-control"
                 :class="{ 'is-invalid': form.errors.has('nationality') }">
          <has-error :form="form" field="nationality"></has-error>
        </div>
      </div>


      <!-- Gender -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('gender') }}</label>
        <div class="col-md-7">
          <input v-model="form.gender" type="text" name="gender" class="form-control"
                 :class="{ 'is-invalid': form.errors.has('gender') }">
          <has-error :form="form" field="gender"></has-error>
        </div>
      </div>


      <!-- Address -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('address') }}</label>
        <div class="col-md-7">
          <input v-model="form.address" type="text" name="address" class="form-control"
                 :class="{ 'is-invalid': form.errors.has('address') }">
          <has-error :form="form" field="address"></has-error>
        </div>
      </div>

      <!-- city -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('city') }}</label>
        <div class="col-md-7">
          <input v-model="form.city" type="text" name="dob" class="form-control"
                 :class="{ 'is-invalid': form.errors.has('city') }">
          <has-error :form="form" field="city"></has-error>
        </div>
      </div>


      <!-- country -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('country') }}</label>
        <div class="col-md-7">
          <input v-model="form.country" type="text" name="dob" class="form-control"
                 :class="{ 'is-invalid': form.errors.has('country') }">
          <has-error :form="form" field="country"></has-error>
        </div>
      </div>


      <!-- state -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('state') }}</label>
        <div class="col-md-7">
          <input v-model="form.state" type="text" name="state" class="form-control"
                 :class="{ 'is-invalid': form.errors.has('state') }">
          <has-error :form="form" field="state"></has-error>
        </div>
      </div>


      <!-- zip -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('zip') }}</label>
        <div class="col-md-7">
          <input v-model="form.zip" type="text" name="dob" class="form-control"
                 :class="{ 'is-invalid': form.errors.has('zip') }">
          <has-error :form="form" field="zip"></has-error>
        </div>
      </div>



      <!-- Submit Button -->
      <div class="form-group row">
        <div class="col-md-9 ml-md-auto">
          <v-button type="success" :loading="form.busy">{{ $t('update') }}</v-button>
        </div>
      </div>
    </form>
  </card>
</template>

<script>
import Form from 'vform'
import { mapGetters } from 'vuex'

export default {
  data: () => ({
    form: new Form({
        first_name: '',
        last_name: '',
        dob: '',
        email: '',
        mobile: '',
        nationality: '',
        address:'',
        gender:'',
        country:'',
        city:'',
        state:'',
        zip: ''
    })
  }),

  computed: mapGetters({
    user: 'authUser'
  }),

  methods: {
    async create () {
        const { data } = await this.form.post('/api/client')
        this.form.reset()
    }
  }
}
</script>
