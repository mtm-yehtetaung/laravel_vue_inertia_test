<template>
<AuthenticatedLayout>
 <div class="flex  flex-col">
    <div class="mb-28">
   <h1 class="text-center mb-3">Main Menu Form</h1>
   <form class="max-w-sm mx-auto relative">

  <div class="mb-5">
    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Main Menu Name</label>
    <input v-model="Menuform.name" type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
  </div>
    <div class="mb-5">
    <label for="menu_link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Menu Link</label>
              <select
              v-model="Menuform.link"
                id="countries"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              >
                <option v-for="route in routes"  :value="route" selected>{{route}}</option>
              </select>
  </div>
  <div class="mb-5">
    <label for="menu_order" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Menu Order</label>
    <input v-model="Menuform.menu_sorting" type="number" id="menu_order" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
  </div>
    <div class="mb-5">
   <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
   
    <div class="relative">
        
        <input readonly type="text" id="default-search" class="block w-full p-4  text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" v-model="selectedIcon" placeholder="Pick icon for Menu " required>
        <button @click.prevent="showPicker"  class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Pick</button>
    </div>
      <div v-if="showpicker" class="absolute right-0 mt-2 w-auto bg-white p-4 border rounded shadow-md">
        <input type="text" placeholder="Search..." class="border p-2 mb-2 w-full rounded focus:outline-none focus:border-blue-500" v-model="searchQuery">
        
        <div class="icons max-w-300 h-40 overflow-y-scroll">
          <i v-for="icon in filteredIcons" :key="icon"  :class="['material-symbols-outlined', 'text-2xl', 'cursor-pointer', 'border', 'rounded-full', 'p-2', 'm-1', 'transition', 'duration-200', 'hover:bg-gray-300', { 'bg-red-500': icon === selectedIcon }]" @click="selectIcon(icon)">{{ icon }}</i>
        </div>
      </div>
  </div>
  <div class="flex items-start mb-5">
    <div class="flex items-center h-5">
      <input v-model="Menuform.is_active" id="active" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" >
    </div>
    <label for="active" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Active</label>
  </div>
  <button @click="addMenu" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
</form>
    </div>

<div>
<h1 class="text-center mb-3">Submenu Form</h1>
<form class="max-w-sm mx-auto relative">

  <div class="mb-5">
    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Submenu Name</label>
    <input v-model="Submenuform.name" type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required>
  </div>
      <div class="mb-5">
    <label for="menu_link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Main Menu</label>
              <select
              v-model="Submenuform.menu_id"
                id="countries"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              >
                <option v-for="menu in menus"  :value="menu.id" selected>{{menu.name}}</option>
              </select>
  </div>

    <div class="mb-5">
    <label for="submenu_link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Menu Link</label>
              <select
              v-model="Submenuform.link"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              >
                <option v-for="route in routes"  :value="route" selected>{{route}}</option>
              </select>
  </div>
  <div class="mb-5">
    <label for="submenu_order" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Menu Order</label>
    <input v-model="Submenuform.menu_sorting" type="number" id="submenu_order" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
  </div>
    <div class="mb-5">
   <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
   
    <div class="relative">
        
        <input readonly type="text" id="default-search" class="block w-full p-4  text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" v-model="selectedSubMenuIcon" placeholder="Pick icon for Menu " required>
        <button @click.prevent="showSubmeuPicker"  class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Pick</button>
    </div>
      <div v-if="showSubMenupicker" class="absolute right-0 mt-2 w-auto bg-white p-4 border rounded shadow-md">
        <input type="text" placeholder="Search..." class="border p-2 mb-2 w-full rounded focus:outline-none focus:border-blue-500" v-model="searchQuery">
        
        <div class="icons max-w-300 h-40 overflow-y-scroll">
          <i v-for="icon in filteredIcons" :key="icon"  :class="['material-symbols-outlined', 'text-2xl', 'cursor-pointer', 'border', 'rounded-full', 'p-2', 'm-1', 'transition', 'duration-200', 'hover:bg-gray-300', { 'bg-red-500': icon === selectedIcon }]" @click="selectSubMenuIcon(icon)">{{ icon }}</i>
        </div>
      </div>
  </div>
  <div class="flex items-start mb-5">
    <div class="flex items-center h-5">
      <input v-model="Submenuform.is_active" id="active" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" >
    </div>
    <label for="active" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Active</label>
  </div>
  <button @click.prevent="addSubmenu" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
</form>
</div>
  </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { iconArray} from '../data/material-icons';
import { ref, watch } from 'vue';
import {useForm,router,usePage} from '@inertiajs/vue3';

const page = usePage();

const selectedIcon = ref('');
const selectedSubMenuIcon = ref('');
const searchQuery = ref('');
const showpicker = ref(false);
const showSubMenupicker = ref(false);
const props = defineProps({
  errors: Object,
  routes: Array,
  
});
const menus = page.props.menus;
const Menuform = useForm({
  name: '',
  link:'',
  menu_icon: '',
  menu_sorting:'',
  is_active: true,

});

const Submenuform= useForm({
  name: '',
  menu_id:'',
  link:'',
  menu_icon: '',
  menu_sorting:'',
  is_active: true,

});

const addMenu =() => {
    router.post("/menu/create", Menuform); 
}

const addSubmenu=() => {
       router.post("/submenu/create", Submenuform); 
}



const materialIcons = iconArray;
const filteredIcons = ref(materialIcons);

watch(searchQuery, (newVal) => {
  const search = newVal.toLowerCase();
  filteredIcons.value = materialIcons.filter(icon => icon.includes(search));
});

const showPicker = () => {
  showpicker.value = !showpicker.value;
};

const showSubmeuPicker = () => {
   showSubMenupicker.value = !showSubMenupicker.value;
}

const selectIcon = (icon) => {
  selectedIcon.value = icon;
  Menuform.menu_icon = icon;
  showpicker.value = false;
  filteredIcons.value =materialIcons;
};

const selectSubMenuIcon=(icon) => {
  selectedSubMenuIcon.value = icon;
  Submenuform.menu_icon = icon;
  showSubMenupicker.value = false;
  filteredIcons.value =materialIcons;
};
</script>

