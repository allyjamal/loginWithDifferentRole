<template>
  <app-card title="App name" class="w-full md:w-1/4">
  {{errors}}
    <Form @submit="onSubmit" :validation-schema="schema">
      <input-field
        label="Enter your email"
        name="email"
        success-message="Nice to meet you!"
        class="mb-4"
      ></input-field>
      <div class="mt-4">
        <button
          type="submit"
          class="button bg-gray-800 text-white text-lg w-full"
        >
          Submit
        </button>
      </div>
    </Form>
  </app-card>
</template>

<script>
import AuthLayout from "../../Layouts/Auth";
import AppCard from "../../Components/Shared/card";
import InputField from "../../Components/Form/inputField";
import * as yup from "yup";
import { Form } from "vee-validate";
import { Inertia } from "@inertiajs/inertia";

export default {
  layout: AuthLayout,
  props: {
    errors: Object
  },
  components: {
    AppCard,
    InputField,
    Form,
  },

  setup() {
    const schema = yup.object({
      email: yup.string().required().email(),
    });

    function onSubmit(values) {
      Inertia.post("/forget-password", values);
    }

    return {
      schema,
      onSubmit,
    };
  },
};
</script>