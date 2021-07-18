<template>
  <div class="bg-gray-50 text-base pt-14 md:pl-60">
    <header
      class="
        flex
        top-0
        left-0
        right-0
        fixed
        h-14
        md:w-auto
        md:pl-60
        bg-white
        border-b border-gray-100
        z-30
        w-screen
        transition-all
        items-center
      "
    >
      <div class="flex justify-between items-center">
        <div class="header__search">
          <input type="search" placeholder="Search" class="header__input" />
          <i class="bx bx-search header__icon"></i>
        </div>
      </div>
    </header>

    <div
      class="
        hidden
        md:block
        w-60
        fixed
        top-0
        z-40
        bg-gray-800
        md:left-0
        h-screen
        flex flex-col
        justify-between
      "
    >
      <nav class="flex flex-col  pb-14 overflow-auto h-95">
        <div
          class="
            flex
            items-center
            justify-center
            mb-10
            font-bold
            text-white text-2xl
            py-2
          "
        >
          <Link href="/dashboard">
            <span>App name</span>
          </Link>
        </div>

        <template v-for="(item ,index) in data.items" :key="index">
          <div
          class="
            flex
            items-center
            justify-center
            font-bold
            text-white text-2xl
            py-2
          "
        >
          <Link :href="item.link">
            <span>{{item.name}}</span>
          </Link>
        </div>
        </template>
      </nav>

      <div
        class="flex items-center justify-center font-bold text-white text-2xl"
      >
        <Link href="/logout">
          <i></i>
          <span>Log Out</span>
        </Link>
      </div>
    </div>

    <main class="p-6">
      <slot></slot>
    </main>
  </div>
</template>


<script>
import { Link } from '@inertiajs/inertia-vue3'
import { reactive} from "vue";


export default {

  components:{
    Link,
  },

  setup(){
    const data = reactive({
      items: [
        {
          'name':'Dashboard',
          'link' : '/dashboard'
       },
       {
          'name':'User',
          'link' : '/users'
       }
      ]
    });

    return {data}
  }
  
}
</script>

