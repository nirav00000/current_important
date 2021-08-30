
import axios from "axios";
import Vue from "vue";

// function showToast(message, type) {
//   Vue.toasted.show(message, {
//     theme: "toasted-primary",
//     type,
//     position: "bottom-right",
//     duration: 5000,
//   });
// }

export default {


  async productList({ commit }) {
     await this.$axios({
      method: "get",
      url: "api/product",
    })
      .then((response) => {
        console.log(response)
        commit("setProductList", response.data);
      })
      .catch(() => {
        console.log('entered in error')

        commit("setProductList", {});
      });
  },

  async productsTableRowDelete(context, data) {
    const response = await this.$axios
      .$delete("api/product/" + data)
      .then((response) => {
        //showToast(response.message, "success");
        context.dispatch("productList");
      });

    return response;
  },

  async productsTableAddNewRow(context, data) {
    const response = await this.$axios
      .$post("api/product", {
        title: data.title,
        description: data.description,
              })
      .then(() => {
        context.dispatch("productList");
      });

    return response;
  },

  async productsTableEditRow(context, data) {

    const response = await this.$axios
      .$put("api/product/" + data.id, {
        title: data.title,
        description: data.description,

      })
      .then((response) => {
        //showToast(response.message, "success");
        context.dispatch("productList");
      });

    //return response;
  },


//===================================my code





  // headerToken({ commit }, auth) {
  //   commit("setToken", auth.token);
  //   commit("setGroups", auth.group);
  // },

  // async logOut({ commit }) {
  //   await this.$axios({
  //     method: "post",
  //     url: "api/v1/logout",
  //   }).then(() => {
  //     if (
  //       process.env.MODE !== "development" &&
  //       process.env.MODE !== "testing"
  //     ) {
  //       this.$cookies.remove("apricot");
  //       axios({ method: "GET", url: "/dex-oauth2/sign_out" })
  //         .then(() => commit("revokeToken"))
  //         .catch(() => {
  //           commit("revokeToken");
  //           window.location.reload();
  //         });
  //     } else {
  //       this.$cookies.remove("apricot");
  //       commit("revokeToken");
  //     }
  //   });
  // },

  // async user({ commit }) {
  //   await this.$axios({
  //     method: "post",
  //     url: "api/v1/users/me",
  //   }).then((response) => {
  //     commit("setUser", response.data);
  //   });
  // },
};
