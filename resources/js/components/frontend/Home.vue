<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Create Form</div>
          <div class="card-body">
            <div class="mb-3">
              <form
                @submit.prevent="is_editing ? updateSubmitForm() : submitForm()"
              >
                <div class="row mb-3">
                  <label for="name" class="col-sm-4 col-form-label">Name</label>
                  <div class="col-sm-8">
                    <input
                      type="text"
                      class="form-control"
                      id="name"
                      v-model="form.name"
                    />
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="email" class="col-sm-4 col-form-label"
                    >Email</label
                  >
                  <div class="col-sm-8">
                    <input
                      type="email"
                      class="form-control"
                      id="email"
                      v-model="form.email"
                    />
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="image" class="col-sm-4 col-form-label"
                    >Image</label
                  >
                  <div class="col-sm-8">
                    <input
                      type="file"
                      class="form-control"
                      id="image"
                      name="image"
                      @change="getImage"
                    />
                  </div>
                </div>

                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-4 pt-0">Gender</legend>
                  <div class="col-sm-8">
                    <div class="row mb-3">
                      <div class="col-sm-6">
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="gender"
                            id="male"
                            value="Male"
                            v-model="form.gender"
                          />
                          <label class="form-check-label" for="male">
                            Male
                          </label>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="gender"
                            id="female"
                            value="Female"
                            v-model="form.gender"
                          />
                          <label class="form-check-label" for="female">
                            Female
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </fieldset>
                <div class="row mb-3">
                  <label for="skill" class="col-sm-4 col-form-label"
                    >Skills</label
                  >
                  <div class="col-sm-8">
                    <div class="row mb-3">
                      <div class="col-sm-6">
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            value="Laravel"
                            v-model="form.skills"
                            id="laravel"
                          />
                          <label class="form-check-label" for="laravel">
                            Laravel
                          </label>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            value="Codeigniter"
                            v-model="form.skills"
                            id="Codeigniter"
                          />
                          <label class="form-check-label" for="Codeigniter">
                            Codeigniter
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-sm-6">
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            value="Ajax"
                            id="ajax"
                            v-model="form.skills"
                          />
                          <label class="form-check-label" for="ajax">
                            Ajax
                          </label>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            value="VUE JS"
                            id="vuejs"
                            v-model="form.skills"
                          />
                          <label class="form-check-label" for="vuejs">
                            VUE JS
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-sm-6">
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            value="MySQL"
                            id="mysql"
                            v-model="form.skills"
                          />
                          <label class="form-check-label" for="mysql">
                            MySQL
                          </label>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            id="api"
                            value="Api"
                            v-model="form.skills"
                          />
                          <label class="form-check-label" for="api">
                            Api
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <button v-if="is_editing" type="submit" class="btn btn-primary">Update</button>
                <button v-else type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
            <div class="mt-5 clearfix">
              <h5 class="border-top">List of Data</h5>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Skills</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Image</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(employee, index) in employees" :key="index">
                    <th scope="row">{{ index + 1 }}</th>
                    <td>{{ employee.name }}</td>
                    <td>{{ employee.email }}</td>
                    <td>
                      <div
                        v-for="(skill, index) in employee.skills"
                        :key="index"
                      >
                        {{ skill }}
                      </div>
                    </td>
                    <td>{{ employee.gender }}</td>
                    <td>
                      <img
                        :src="`${employee.image}`"
                        width="100"
                        height="100"
                        alt="Employee Image"
                      />
                    </td>
                    <td>
                      <button
                        type="button"
                        class="btn btn-primary"
                        @click.prevent="editEmployee(employee.id)"
                      >
                        Edit
                      </button>
                      <button
                        type="button"
                        class="btn btn-danger"
                        @click.prevent="deleteEmployee(employee.id)"
                      >
                        Delete
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "home",
  data: () => ({
    form: new Form({
      id: "",
      name: "",
      email: "",
      gender: "",
      skills: [],
      image: null,
    }),
    is_editing: false,
    employees: [],
  }),

  mounted() {
    this.getEmployees();
  },
  methods: {
    getEmployees() {
      axios
        .get("http://127.0.0.1:8000/api/employees")
        .then((response) => {
          this.employees = response.data.data;
          console.log(this.employees);
        })
        .catch((error) => {
          console.warn(error);
        });
    },

    submitForm() {
      let formData = new FormData();

      formData.append("name", this.form.name);
      formData.append("gender", this.form.gender);

      var arr = this.form.skills;
      for (var i = 0; i < arr.length; i++) {
        formData.append("skills[]", arr[i]);
      }

      formData.append("image", this.form.image);
      formData.append("email", this.form.email);

      axios
        .post("api/employees/store", formData)
        .then((response) => {
          this.getEmployees();
          console.log(response);
        })
        .catch((error) => {
          console.warn(error);
        });
    },

    updateSubmitForm() {
      let formData = new FormData();

      formData.append("name", this.form.name);
      formData.append("gender", this.form.gender);

      var arr = this.form.skills;
      for (var i = 0; i < arr.length; i++) {
        formData.append("skills[]", arr[i]);
      }

      if (this.form.image) {
        formData.append("image", this.form.image);
      }

      formData.append("email", this.form.email);
      formData.append("_method", "PUT");

      axios
        .post(`api/employee/update/${this.form.id}`, formData)
        .then((response) => {
          this.getEmployees();
          console.log(response);
        })
        .catch((error) => {
          console.warn(error);
        });
    },

    getImage(event) {
      this.form.image = event.target.files[0];
    },

    deleteEmployee(id) {
      axios
        .get(`api/employee/delete/${id}`)
        .then((response) => {
          this.getEmployees();
          console.log(response);
        })
        .catch((error) => {
          console.warn(error);
        });
    },

    editEmployee(id) {
      axios
        .get(`api/employee/${id}/edit`)
        .then((response) => {
          this.is_editing = true;
          this.form.id = response.data.id;
          this.form.name = response.data.name;
          this.form.email = response.data.email;
          this.form.gender = response.data.gender;

          const skills = response.data.skills;

          for (const value of skills) {
            this.form.skills.push(value);
          }
        })
        .catch((error) => {
          console.warn(error);
        });
    },
  },
};
</script>

<style scoped>
</style>

