<template>
  <app-card title="App name" class="w-full md:w-1/4">
    {{errors.credentials}}
    <Form @submit="onSubmit" :validation-schema="schema">
      <input-field
        label="Email"
        name="email"
        class="mb-4"
      ></input-field>
      <input-field
        label="Password"
        name="password"
        link="/forget-password"
      ></input-field>
      <div class="mt-4">
        <button
          type="submit"
          class="font-semibold py-2 px-4 rounded whitespace-nowrap cursor-pointer bg-gray-800 text-white text-lg w-full"
        >
          Login
        </button>
      </div>
    </Form>
  </app-card>
</template>

<script>
import AuthLayout from "@/Layouts/Auth";
import AppCard from "@/Components/Shared/card";
import InputField from "@/Components/Form/inputField";
import * as yup from "yup";
import { Form } from "vee-validate";
import { Inertia } from '@inertiajs/inertia'


export default {
  layout: AuthLayout,
  props: {
    errors: Object
  },

  components: {
    AppCard,
    InputField,
    Form

  },

  setup() {
    const schema = yup.object({
      email: yup.string().required().email(),
      password: yup.string().required().min(8),
    });

    function onSubmit(values) {
      // alert(JSON.stringify(values, null, 2));
      Inertia.post("/login",values);
    }

    return {
      schema,
      onSubmit,
    };
  },
};
</script>