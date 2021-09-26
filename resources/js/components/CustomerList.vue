<template>
  <div class="card-body">
    Customers
    <table class="table table-striped">
      <thead>
        <tr>
          <th width="20%">Name</th>
          <th width="25%" :class="{ 'd-none': isMobile }">Address</th>
          <th width="15%">Contacts</th>
          <th width="10%" class="text-center" :class="{ 'd-none': isMobile }">Number of accounts</th>
          <th width="10%" :class="{ 'd-none': isMobile }">Lifetime Spend</th>
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
            <td :class="{ 'd-none': isMobile }">{{ customer.address }}</td>
            <td>
              {{ customer.email }} <br />
              {{ customer.phone_number }} <br>
              {{ customer.principal_contact_name }} 
            </td>
            <td class="text-center" :class="{ 'd-none': isMobile }">{{ customer.total_accounts }}</td>
            <td :class="{ 'd-none': isMobile }">{{ customer.lifetime_usd_spend }}</td>
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
      isMobile: true
    };
  },
  created() {
    window.addEventListener("resize", this.checkIfMobile);
  },
  destroyed() {
    window.removeEventListener("resize", this.checkIfMobile);
  },
  methods: {
    checkIfMobile(){
      this.isMobile =  window.innerWidth < 770
    }
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
