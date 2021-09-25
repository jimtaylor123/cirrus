<template>
  <table class="table table-striped">
    <thead>
      <tr>
        <th width="20%">Name</th>
        <th width="20%">Email | Phone</th>
        <th width="20%">Main Contact</th>
        <th width="10%">Accounts</th>
        <th width="10%">Lifetime Spend</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="customer in customers" v-bind:key="customer.name" >
        <td>{{ customer.name }}</td>
        <td>{{ customer.email}} <br> {{ customer.phone_number}}</td>
        <td>{{ customer.principal_contact_name? customer.principal_contact_name : 'N/A'   }}</td>
        <td>{{ customer.total_accounts}}</td>
        <td>{{ customer.lifetime_usd_spend}}</td>
      </tr>
    </tbody>
  </table>
</template>

<script>
export default {
  data() {
    return {
      loading: true,
      customers: []
    }
  },
  mounted() {
    axios
      .get('customers')
      .then((response) => {
        console.log('RES', response.data)
        this.customers = response.data.data;
        this.loading = false; 
      })
      .catch((error) => {
        this.loading = false;
        console.log("Unable to fetch customers.");
      });
  },
};
</script>
