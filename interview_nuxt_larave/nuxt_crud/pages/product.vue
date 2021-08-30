<template>

  <div >


  my page working?<br/>
  title => {{title}}
  title => {{description}}
  </div>
</template>

<script>
export default {
  data() {
    return {
      description:'',
      title:''
    };
  },
  async fetch()
  {
    let {data} = this.$axios({
      method: "get",
      url: "api/product",
    })
      .then((response) => {
        let res = {...response.data}
        this.description = res[0].description;
        this.title = res[0].title
         console.log(res);
      })
  }
};
</script>
