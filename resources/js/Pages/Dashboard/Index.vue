<template>
  <component :is="currentDashboard"></component>
</template>

<script>
import { computed } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";
import DashboardAdmin from "./admin";
import DashboardParent from "./parent";
import DashboardStudent from "./student";
import DashboardTeacher from "./teacher";
import SystemLayout from "../../Layouts/System";

export default {
  layout: SystemLayout,

  components: {
    DashboardAdmin,
    DashboardParent,
    DashboardStudent,
    DashboardTeacher,
  },
  setup() {
    const user = computed(() => usePage().props.value.auth.user);
    console.log(user.value.role);
    const currentDashboard = computed(() => {
      if (user.value.role == 2) {
        return "DashboardTeacher";
      } else if (user.value.role == 3) {
        return "DashboardStudent";
      } else if (user.value.role == 4) {
        return "DashboardParent";
      } else {
        return "DashboardAdmin";
      }
    });

    return { user, currentDashboard };
  },
};
</script>


