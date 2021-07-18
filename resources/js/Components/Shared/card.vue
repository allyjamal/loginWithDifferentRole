<template>
  <div class="card bg-white border border-gray-100 rounded overflow-hidden shadow-xl">
    <header v-if="title" class="flex items-stretch border-b border-gray-100">
      <p class="flex items-center py-3 px-4 flex-grow font-bold">
        {{ title }}
      </p>
      <a
        v-if="headerIcon"
        href="#"
        class="flex items-center py-3 px-4 justify-center"
        aria-label="more options"
        @click.prevent="headerIconClick"
      >
        <!-- <icon :path="headerIcon" /> -->
      </a>
    </header>
    <div class="p-6">
      <slot />
    </div>

      <slot name="action"></slot>
  </div>
</template>

<script>
export default {
  name: "CardComponent",
  props: {
    title: {
      type: String,
      default: null,
    },
    icon: {
      type: String,
      default: null,
    },
    headerIcon: {
      type: String,
      default: null,
    },
    hasTable: {
      type: Boolean,
      default: false,
    },
    isEmpty: {
      type: Boolean,
      default: false,
    },
  },
  emits: ["header-icon-click"],
  setup(props, { emit }) {
    const headerIconClick = () => {
      emit("header-icon-click");
    };

    return { headerIconClick };
  },
};
</script>

<style scoped>
.card:not(:last-child) {
  @apply mb-6;
}
</style>
