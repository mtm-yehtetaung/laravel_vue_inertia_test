<template>
  <AuthenticatedLayout>
    <form class="max-w-sm mx-auto" @submit.prevent="submit">
      <div class="grid gap-6 md:grid-cols-2">
        <div class="mb-5">
          <label
            for="code"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
            >Code</label
          >
          <input
            type="text"
            v-model="form.code"
            id="code"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="name@flowbite.com"
            required
          />
        </div>
        <div class="self-center mb-5">
          <div class="flex items-center">
            <input
              v-model="form.active"
              id="checked-checkbox"
              type="checkbox"
              class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            />
            <label
              for="checked-checkbox"
              class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
              >Active</label
            >
          </div>
        </div>
      </div>
      <div class="mb-5">
        <label
          for="email"
          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
          >Assets Class</label
        >
        <select
          v-model="form.assetClass"
          id="countries"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        >
          <option value="Accessories" selected>Accessories</option>
          <option value="Computer">Computer</option>
          <option value="Furniture">Furniture</option>
        </select>
      </div>
      <div class="mb-5">
        <label
          for="password"
          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
          >Assets Name</label
        >
        <input
          type="text"
          v-model="form.assetName"
          id="password"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          required
        />
      </div>
      <button
        type="submit"
        class="text-white bg-purple-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
      >
        Register
      </button>
    </form>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10">
      <table
        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
      >
        <thead
          class="text-xs text-white uppercase bg-purple-500 dark:bg-gray-700 dark:text-gray-400"
        >
          <tr>
            <th scope="col" class="px-6 py-3">Code</th>
            <th scope="col" class="px-6 py-3">Assets Class</th>
            <th scope="col" class="px-6 py-3">Assets Name</th>
            <th scope="col" class="px-6 py-3">Active</th>
            <th scope="col" class="px-6 py-3">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="asset in assets.data"
            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
          >
            <th
              scope="row"
              class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
            >
              {{ asset.code }}
            </th>
            <td class="px-6 py-4">
              {{ asset.assets_class }}
            </td>
            <td class="px-6 py-4">
              {{ asset.assets_name }}
            </td>
            <td class="px-6 py-4">
              <span v-if="asset.active === 1" class="text-green-600"
                >Active</span
              >
              <span v-else class="text-red-600">Inactive</span>
            </td>
            <td class="px-6 py-4">
              <button
                @click="editAsset(asset)"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
              >
                Edit
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <Teleport to="body">
      <TeleportModal :show="showModal">
        <template #header>
          <h2>Edit Form</h2>
        </template>
        <template #body>
          <form class="max-w-sm mx-auto" @submit.prevent="submit">
            <div class="grid gap-6 md:grid-cols-2">
              <div class="mb-5">
                <label
                  for="code"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                  >Code</label
                >
                <input
                  type="text"
                  v-model="updateForm.code"
                  id="code"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="name@flowbite.com"
                  required
                />
              </div>
              <div class="self-center mb-5">
                <div class="flex items-center">
                  <input
                    v-model="updateForm.active"
                    id="checked-checkbox"
                    type="checkbox"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                  />
                  <label
                    for="checked-checkbox"
                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                    >Active</label
                  >
                </div>
              </div>
            </div>
            <div class="mb-5">
              <label
                for="email"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >Assets Class</label
              >
              <select
                v-model="updateForm.assetClass"
                id="countries"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              >
                <option value="Accessories">Accessories</option>
                <option value="Computer">Computer</option>
                <option value="Furniture">Furniture</option>
              </select>
            </div>
            <div class="mb-5">
              <label
                for="password"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >Assets Name</label
              >
              <input
                type="text"
                v-model="updateForm.assetName"
                id="password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required
              />
            </div>
          </form>
        </template>
        <template #footer>
          <div class="flex justify-center items-center gap-2">
            <button
            @click="destroyModal"
              class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            >
              Cancel
            </button>
            <button
            @click="updateAsset(updateForm.id)"
              type="submit"
              class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
            >
              Update
            </button>
          </div>
        </template>
      </TeleportModal>
    </Teleport>
  </AuthenticatedLayout>
</template>
<script setup>
import TeleportModal from "@/Components/TeleportModal.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Link, useForm, router } from "@inertiajs/vue3";
import {ref} from 'vue';

let showModal = ref(false);
defineProps({
  errors: Object,
  assets: Array,
});
const destroyModal = () => {
    showModal.value = false;
};

const updateAsset = (id) => {
    router.put(`/assets/edit/${id}`, updateForm);
    showModal.value = false;
};

const form = useForm({
  code: null,
  assetClass: null,
  assetName: null,
  active: true,
});
const updateForm = useForm({
  code: null,
  assetClass: null,
  assetName: null,
  active: true,
  id:null,
});

function submit() {
  console.log(form);
  router.post("/assets/create", form);
}

const editAsset = (data) => {
  showModal.value = true;
  updateForm.id = data.id;
  updateForm.code = data.code;
  updateForm.assetClass = data.assets_class;
  updateForm.assetName = data.assets_name;
  updateForm.active = data.active == 1 ? true : false;
};
</script>