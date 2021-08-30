<template>
  <div class="indicate-block">
    <b-modal
      id="modal-prevent-closing"
      ref="modal"
      title="Submit product Detail"
      :static="true"
      @ok="handleOk"
      @hidden="handleHide"
    >
      <b-form ref="form" @submit.stop.prevent="handleSubmit">
        <div ref="indicate">
          <b-form-group
            label="title"
            label-for="title-input"
            invalid-feedback="title is required"
          >
            <b-form-input
              id="title"
              v-model="dataComponent.title"
              class="title"
              title="title"
              required
            ></b-form-input>
            <i v-if="errors.title" class="text-danger">{{ errors.title }}</i>
          </b-form-group>

         <b-form-group
            label="description"
            label-for="description-input"
            invalid-feedback="description is required"
          >
            <b-form-input
              id="description"
              v-model="dataComponent.description"
              class="description"
              description="description"
              required
            ></b-form-input>
            <i v-if="errors.description" class="text-danger">{{ errors.description }}</i>
          </b-form-group>


        </div>
      </b-form>
    </b-modal>
  </div>
</template>

<script>
export default {
  props:
    // 2.data for edit/add product,, action=add in add product(other empty)
  [ "data" ]
  ,

  data() {
    return {
      dataComponent: this.data, // 2.props are taken into vatiable for accessing values

      errors: {
        title: "",
        description: "",
      },
    };
  },

  methods: {
    checkForm() {
      this.errors = {};

      if (!this.dataComponent.title) {
        this.errors.title = "title is required.";
      }

      if (!this.dataComponent.description) {
        this.errors.description = "description is required.";
      }


      if (!Object.keys(this.errors).length) {
        return true;
      } else {
        return false;
      }
    },
    handleHide() {
      this.errors = {};
    },

    handleOk(bvModalEvt) {
      bvModalEvt.preventDefault();
      this.handleSubmit();
    },
    handleSubmit() {
      if (!this.checkForm()) {
        return;
      }

      const action = this.dataComponent.action;

      if (action === "add") {
        //console.log(this.dataComponent);
        this.$store.dispatch("productsTableAddNewRow", this.dataComponent);
      } else {
        //console.log(this.dataComponent);
        this.$store.dispatch("productsTableEditRow", this.dataComponent);
      }

      this.$emit("closeModal");

    },
  },
};
</script>
