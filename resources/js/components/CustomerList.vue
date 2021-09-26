<template>
  <div class="card-body">
    Customers
    <table class="table table-striped">
      <thead>
        <tr>
          <th width="20%">Name</th>
          <th width="25%">Address</th>
          <th width="15%">Contacts</th>
          <th width="10%" class="text-center">Number of accounts</th>
          <th width="10%">Lifetime Spend</th>
        </tr>
      </thead>
      <tbody>
          <tr 
            v-for="customer in customers" 
            v-bind:key="customer.name" 
            @click="$router.push({ path: `customers/${customer.id}`})"
            style="cursor:pointer"
          >
            <td>{{ customer.name }}</td>
            <td>{{ customer.address }}</td>
            <td>
              {{ customer.email }} <br />
              {{ customer.phone_number }} <br>
              {{ customer.principal_contact_name }} 
            </td>
            <td class="text-center">{{ customer.total_accounts }}</td>
            <td>{{ customer.lifetime_usd_spend }}</td>
          </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      customers: [],
    };
  },
  mounted() {
    axios
      .get("api/customers")
      .then((response) => {
        this.customers = response.data.data;
      })
      .catch((error) => {
        console.log("Unable to fetch data.");
      });
  },
};
</script>
