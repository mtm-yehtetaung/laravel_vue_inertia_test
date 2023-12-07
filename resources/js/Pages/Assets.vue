<template>
  <AuthenticatedLayout>
    <div class="container mx-auto">
      <div class="max-w-2xl mx-auto bg-white rounded p-6">
        <h2 class="text-2xl text-center font-semibold mb-4">Office Assets Form</h2>

        <form>
          <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div class="flex flex-row gap-5">
              <div >
                <label
                  for="first_name"
                  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                  >Code</label
                >
                 <select
                 @change="changeCode"
                id="countries"
                v-model="form.code"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              >
              
                <option v-for="asset in assets"
                 :bind="asset.id" :value="asset.id" >{{asset.code}}</option>
              </select>
              </div>
              <div class="w-full">
                <label
                  for="first_name"
                  class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                  >Serial Number</label
                >
                <input
                  type="text"
                  id="first_name"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="John"
                  required
                />
              </div>
            </div>
            <div>
              <label
                for="last_name"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >Assets Class</label
              >
              <select
              v-model="form.assetClass"
                id="countries"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              >
                <option value="Accessories" selected>Accessories</option>
                <option value="Furniture">Furniture</option>
                <option value="Equipment">Equipment</option>
                <option value="Vehicle">Vehicle</option>
              </select>
            </div>
            <div>
              <label
                for="company"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >Assets Name</label
              >
              <input
                type="text"
                id="company"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Extension"
                required
              />
            </div>
            <div>
              <label
                for="phone"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >Brand Name</label
              >
              <input
                type="text"
                id="phone"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Enter Brand Name"
                required
              />
            </div>
            <div>
              <label
                for="website"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >Purchase Date</label
              >
              <input
                type="date"
                id="phone"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Enter Brand Name"
                required
              />
            </div>
            <div>
              <label
                for="visitors"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >Status</label
              >
              <select
                id="countries"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              >
                <option value="US" selected></option>
                <option value="CA"></option>
                <option value="FR"></option>
                <option value="DE"></option>
              </select>
            </div>
            <div>
              <label
                for="last_name"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >Accounting Status</label
              >
              <select
                id="countries"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              >
                <option value="US" selected>Accessories</option>
                <option value="CA">Furniture</option>
                <option value="FR">Equipment</option>
                <option value="DE">Vehicle</option>
              </select>
            </div>
            <div>
              <label
                for="first_name"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >Qty</label
              >
              <input
                type="number"
                id="first_name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required
              />
            </div>

            <div>
              <label
                for="first_name"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >Barcode Number</label
              >
              <input
                type="text"
                id="first_name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Enter Barcode Number"
                required
              />
            </div>

            <div>
              <label
                for="first_name"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >Last Check Date</label
              >
              <input
                type="date"
                id="first_name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Enter Date"
                required
              />
            </div>

            <div>
              <label
                for="first_name"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >Floor</label
              >
              <select
                id="countries"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              >
                <option value="US" selected></option>
                <option value="CA"></option>
                <option value="FR"></option>
                <option value="DE"></option>
              </select>
            </div>

            <div>
              <label
                for="first_name"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >Placement Location</label
              >
              <input
                type="text"
                id="first_name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Enter Location"
                required
              />
            </div>

            <div>
              <div class="flex items-center justify-center w-full">
                <label
                  for="dropzone-file"
                  class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
                >
                  <div
                    class="flex flex-col items-center justify-center pt-5 pb-6"
                  >
                    <svg
                      class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                      aria-hidden="true"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 20 16"
                    >
                      <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"
                      />
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                      <span class="font-semibold">Click to upload</span> or drag
                      and drop
                    </p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">
                      SVG, PNG, JPG or GIF (MAX. 800x400px)
                    </p>
                  </div>
                  <input id="dropzone-file" type="file" class="hidden" />
                </label>
              </div>
            </div>
          </div>
          <div class="mb-6">
            <label
              for="message"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >Remark</label
            >
            <textarea
              id="message"
              rows="4"
              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Write your thoughts here..."
            ></textarea>
          </div>

          <div class="mb-6 flex justify-center">
            <button
              type="submit"
              class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            >
              Register
            </button>
          </div>
        </form>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Link, useForm, router } from "@inertiajs/vue3";
const props = defineProps({
  errors: Object,
  assets: Array,
});
const form = useForm({
  code: null,
  assetClass: null,
});
const changeCode = () => {
const assetData = props.assets.find( data => data.id == form.code)
form.assetClass = assetData.assets_class
}
</script>