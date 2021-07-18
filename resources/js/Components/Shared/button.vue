<template>
  <button :type="type" class="button flex items-center">
    <app-icon :icon="icon" v-if="checkIconIsPassed" :h="iconHeight" :w="iconWidth" class="mr-2"></app-icon>
    <slot />
  </button>
</template>

<script>
import AppIcon from "./icon";
export default {
  props: {
    icon: {
      type: String,
      default: null,
    },
    type:{
      type: String,
      default:'submit'
    },
    iconHeight:{
      type:String,
      default: 'h-4'
    },
    iconWidth:{
      type:String,
      default: 'w-4'
    }
  },
  computed: {
    // check item have menu
    checkIconIsPassed() {
      return !!this.icon;
    },
  },
  components: {
    AppIcon,
  },
};
</script>

<style>
</style>