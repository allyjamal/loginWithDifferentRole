<template>
  <div :class="['w-full']">
    <div class="flex justify-between pr-3">
      <label
        :for="name"
        :class="[
          'block text-sm font-bold text-gray-700 mb-2',
          { 'text-red-500': !!errorMessage },
        ]"
        >{{ label }}</label
      >
      <a :href="link" class="text-sm font-bold text-blue-500" v-if="hasLink">Forgot password?</a>
    </div>
    <input
      :name="name"
      :id="name"
      :type="type"
      :value="inputValue"
      @input="handleChange"
      @blur="handleBlur"
      :class="[
        {
          'focus:border-red-500 focus:ring-red-500': !!errorMessage,
          'focus:border-green-500 focus:ring-green-500': meta.valid,
        },
      ]"
    />

    <p class="text-red-500" v-show="errorMessage">
      {{ errorMessage }}
    </p>
  </div>
</template>

<script>
import { computed } from "vue";

import { useField } from "vee-validate";

export default {
  props: {
    type: {
      type: String,
      default: "text",
    },
    value: {
      type: String,
      default: "",
    },
    name: {
      type: String,
      required: true,
    },
    label: {
      type: String,
      required: true,
    },
    successMessage: {
      type: String,
      default: "",
    },
    link: {
      type: String,
      default: "",
    },
  },
  setup(props) {
    const hasLink = computed(() => !!props.link);

    const {
      value: inputValue,
      errorMessage,
      handleBlur,
      handleChange,
      meta,
    } = useField(props.name, undefined, {
      initialValue: props.value,
    });

    return {
      handleChange,
      handleBlur,
      errorMessage,
      inputValue,
      meta,
      hasLink,
    };
  },
};
</script>
