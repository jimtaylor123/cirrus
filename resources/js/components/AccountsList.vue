<template>
  <div class="card-body">
    <router-link :to="{path: '/customers/'}">Customers</router-link> > {{customer.name}}
    <table class="table table-striped">
      <thead>
        <tr>
          <th width="20%">Name</th>
          <th width="25%">Created</th>
          <th width="10%">Lifetime Spend</th>
        </tr>
      </thead>
      <tbody>
          <tr 
            v-for="account in accounts" 
            v-bind:key="account.name" 
            @click="$router.push({ path: `/accounts/${account.id}`})"
            style="cursor:pointer"
          >
            <td>{{ account.name }}</td>
            <td>{{ $moment(account.created_at).fromNow() }}</td>
            <td>{{ account.lifetime_usd_spend }}</td>
          </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  props: ['customerId'],
  data() {
    return {
      accounts: [],
      customer: {}
    };
  },
  mounted() {
    axios
      .get(`/api/customers/${this.customerId}/accounts`)
      .then((response) => {
        this.accounts = response.data.data;
        this.customer = response.data.customer;
      })
      .catch((error) => {
        console.log("Unable to fetch data.");
      });
  },
};
</script>
