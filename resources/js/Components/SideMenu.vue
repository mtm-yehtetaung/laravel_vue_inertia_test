<template>
  <aside
    id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar"
  >
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
      <ul class="space-y-2 font-medium">
        <li v-for="menu in menus" :bind="menu.id">
          <div v-if="menu.sub_menus && menu.sub_menus.length > 0">
          <button
            v-if="menu.is_active"
            type="button"
            class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
            :aria-controls="'dropdown-' + menu.name"
            :data-collapse-toggle="'dropdown-' + menu.name"
          >
            <span class="material-symbols-outlined">
              {{ menu.menu_icon }}
            </span>
            <span
              class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap"
              >{{ menu.name }}</span
            >
            <svg
              class="w-3 h-3"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 10 6"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="m1 1 4 4 4-4"
              />
            </svg>
          </button>
          <ul :id="'dropdown-' + menu.name" class="hidden py-2 space-y-2">
            <li v-for="submenu in menu.sub_menus">
             
              <Link
                :href="route(submenu.link)"
                v-if="submenu.is_active"
                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                > <span class="material-symbols-outlined mr-2">
                {{ submenu.menu_icon }}
              </span> {{ submenu.name }}</Link>
            </li>
          </ul>
          </div>
          <div v-else>
           <Link
                :href="route(menu.link)"
                v-if="menu.is_active"
                class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                > <span class="material-symbols-outlined mr-2">
                {{ menu.menu_icon }}
              </span> {{ menu.name }}</Link>
          </div>

        </li>
      </ul>
    </div>
  </aside>
</template>
<script setup>
import { Link, usePage } from "@inertiajs/vue3";
const page = usePage();
defineProps({
  errors: Object,
});
const menus = page.props.menus;
</script>