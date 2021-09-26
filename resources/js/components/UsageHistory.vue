<template>
  <div class="card-body">
     <router-link :to="{path: '/customers/'}">Customers</router-link> > 
    <router-link :to="{path: '/customers/' + customer.id}">{{customer.name}}</router-link> > Usage History
    <table class="table table-striped">
      <thead>
        <tr>
          <th >Month</th>
          <th class="text-right">Value (USD)</th>
        </tr>
      </thead>
      <tbody>
          <tr 
            v-for="monthlyUsage in monthlyUsages" 
            v-bind:key="monthlyUsage.id" 
          >
            <td>{{ $moment(monthlyUsage.month, 'MM').format('MMMM') }} {{ monthlyUsage.year }}</td>
            <td class="text-right">${{ monthlyUsage.cents / 100 }}</td>
          </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  props: ['accountId'],
  data() {
    return {
      monthlyUsages: [],
      customer: {},
      account: {}
    };
  },
  mounted() {
    axios
      .get(`/api/accounts/${this.accountId}/monthlyusages`)
      .then((response) => {
        this.monthlyUsages = response.data.data;
        this.customer = response.data.customer;
        this.account = response.data.account;
      })
      .catch((error) => {
        console.log("Unable to fetch data.");
      });
  },
};
</script>
