<template>
  <!-- container-fluid -->

  <div class="container-fluid">
    <Modal :data="payload" v-if="showModal" @closeModal="closeModal" />
    <DeleteConfirm :data="deletePayload"  />
    <!-- container -->
    <div class="container mt-5">
      <b-button
        id="add"
        variant="primary"
        class="float-right font-weight-bold"
        v-b-modal.modal-prevent-closing
        @click="openmodal('add')"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="16"
          height="16"
          fill="currentColor"
          viewBox="0 0 16 16"
          class="bi bi-file-plus-fill"
        >
          <path
            d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z"
          ></path>
        </svg>
        &nbsp;&nbsp;Add Product</b-button
      ><br />

      <label class="float-left"
        ><h3>Total Product : {{ items.length }}</h3></label
      >

      <div class="mb-1 mt-1"></div>
      <div v-if="!items.length && !isLoading" class="text-center">
        <br /><br /><br /><br /><br /><br /><span
          ><h1>No products available.</h1></span
        >
      </div>
      <div v-if="isLoading" class="text-center">
        <br /><br /><br /><br /><br /><br /><span><h3>Loading...</h3></span>
      </div>
      <div v-if="items.length && !isLoading">
        <b-table
          :items="items"
          :fields="fields"
          stacked="md"
          show-empty
          small
          class="data-table-products"
        >
          <template #cell(action)="row">
            <b-button
              :id="'edit' + row.index"
              v-b-modal.modal-prevent-closing
              :data-qa="'edit' + row.index"
              class="btn btn-primary edit font-weight-bold"
              @click="openmodal(row.item)"
            >
              Edit
            </b-button>
            <b-button
              :id="row.index + 1000"
              v-b-modal.delete-confirm
              class="btn btn-danger font-weight-bold"
              @click="deleteRow(row.item)"
            >
              Delete
            </b-button>
          </template>
        </b-table>
      </div>
    </div>
  </div>
</template>

<script>
import Modal from "@/components/Modal";
import DeleteConfirm from "@/components/DeleteConfirm";
export default {
  components: {
    Modal,
    DeleteConfirm,
  },
  layout: "admin",
  data() {
    return {
      payload: {
        action: "",
        title: "",
        description: ""
      },
      deletePayload: {
        action: "",
        id: "",
        item_name: "",
      },
      showModal: false,

      isLoading: true,
      fields: ["title", "description", "action"],
    };
  },
  async fetch() {
    await this.$store.dispatch("productList");
    this.isLoading=false;
  },
  computed: {
    items() {
      return this.$store.getters.getProductList
        ? this.$store.getters.getProductList
        : {};
    },
  },
  methods: {
    deleteRow(row) {
      this.deletePayload.action = "productsTableRowDelete";
      this.deletePayload.id = row.id;
      this.deletePayload.item_name = "'" + row.title + "'" + " Product";
    },
    openmodal(action) {
      // 1.opens modal for add product
      if (action === "add") {
        // payload is data passed to props
        this.payload.title = "";
        this.payload.description = null;
        this.payload.id = "";
        this.payload.action = "add";
      } else {
        this.payload.title = action.title;
        this.payload.description = action.description;
        this.payload.id = action.id;
        this.payload.action = "edit";
      }

      this.showModal = true;
    },
    closeModal() {
      this.showModal = false;
    },
  },
};
</script>
