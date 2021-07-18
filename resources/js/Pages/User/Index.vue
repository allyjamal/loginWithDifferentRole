<template>
  <component :is="currentUser"></component>
</template>

<script>
import { computed } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";
import UserAdmin from "./admin";
import UserParent from "./parent";
import UserStudent from "./student";
import UserTeacher from "./teacher";
import SystemLayout from "../../Layouts/System";

export default {
  layout: SystemLayout,

  components: {
    UserAdmin,
    UserParent,
    UserStudent,
    UserTeacher,
  },
  setup() {
    const user = computed(() => usePage().props.value.auth.user);
    console.log(user.value.role);
    const currentUser = computed(() => {
      if (user.value.role == 2) {
        return "UserTeacher";
      } else if (user.value.role == 3) {
        return "UserStudent";
      } else if (user.value.role == 4) {
        return "UserParent";
      } else {
        return "UserAdmin";
      }
    });

    return { user, currentUser };
  },
};
</script>


