export default {
  getProductList(state) {
    return state.products;
  },
  // getToken: (state) => {
  //   return state.token;
  // },
  // getUser: (state) => {
  //   return state.user;
  // },
  // getGroups: (state) => {
  //   return state.groups;
  // },
  // isAdmin: (state) => {
  //   // In stagging inside group set array
  //   if (Array.isArray(state.groups))
  //     return state.groups.includes(process.env.LDAP_ADMIN_GROUP_NAME);
  //   else
  //     return state.groups
  //       .split(",")
  //       .includes(process.env.LDAP_ADMIN_GROUP_NAME);
  // },
  // getQuestionnaireList: (state) => {
  //   return state.questionnaireList;
  // },
};
