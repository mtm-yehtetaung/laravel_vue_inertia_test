<template>
  <AuthenticatedLayout>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <button
        @click="exportBooks"
        type="button"
        class="focus:outline-none mb-3 text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900"
      >
        Download
      </button>
      <div>
              <label
                for="website"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >From</label
              >
              <input
              v-model="fromDate"
                type="date"
                id="phone"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Enter Brand Name"
                required
              />
            </div>

                  <div class="mb-5">
              <label
                for="website"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >To</label
              >
              <input
              v-model="toDate"
                type="date"
                id="phone"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Enter Brand Name"
                required
              />
            </div>

      <table
        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
      >
        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
              Title
            </th>
            <th scope="col" class="px-6 py-3">Author</th>
            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
              Pages
            </th>
            <th scope="col" class="px-6 py-3">Price</th>
          </tr>
        </thead>
        <tbody>
          <tr
            class="border-b border-gray-200 dark:border-gray-700"
            v-for="book in books.data"
            :bind="book.id"
          >
            <th
              scope="row"
              class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800"
            >
              {{ book.title }}
            </th>
            <td class="px-6 py-4">
              {{ book.author }}
            </td>
            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
              {{ book.pages }}
            </td>
            <td class="px-6 py-4">$ {{ book.price }}</td>
          </tr>
        </tbody>
      </table>

      <Pagination class="mt-6" :links="books.links" />
    </div>
  </AuthenticatedLayout>
</template> 


<script setup>
import * as XLSX from 'xlsx';
import Pagination from '@/Components/Pagination.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link } from "@inertiajs/vue3";
import { ref } from 'vue';
const fromDate = ref();
const toDate = ref();
  const props = defineProps({
  errors: Object,
  books: Array,
});
const exportBooks = () => {

const getMonthNamesBetweenDates = (startDate, endDate)=> {
  const start = new Date(startDate);
  const end = new Date(endDate);

  const monthNames = [];
  let currentDate = start;

  while (currentDate <= end) {
   const monthName = currentDate.toLocaleString('default', { month: 'short' });
    monthNames.push({
      [monthName]:200
    });
    currentDate.setMonth(currentDate.getMonth() + 1);
  }

   const mergedObject = Object.assign({}, ...monthNames);

  return mergedObject;
}

// Example usage
const from = fromDate.value;
const to = toDate.value;
const monthsArray = getMonthNamesBetweenDates(from, to);


  const workbook = XLSX.utils.book_new();
  const calculateColWidths = (data) => {
      const maxWidths= {};

      data.forEach((item) => {
        console.log(Object);
        Object.keys(item).forEach((key)=> {
          const cellValue = item[key] ? item[key].toString() : "";
          const cellWidth = cellValue.length + 2; // Add some extra space
          maxWidths[key] = Math.max(maxWidths[key] || 0, cellWidth);
        });
      });

      return Object.keys(maxWidths).map((key)=> ({ width: maxWidths[key] }));
    };
    // const filteredBooksData = props.books.data.map(({ created_at, updated_at, ...book }) => {
    //   console.log(book);
    // });
    const filteredBooksData = props.books.data.map(({ created_at, updated_at, ...book }) => {
  // Add a new key-value pair to each book
  const newBook = {
    ...book,
   ...monthsArray
  };

  return newBook; // Return the modified book
});

    const worksheet = XLSX.utils.json_to_sheet(filteredBooksData);
    worksheet["!cols"] = calculateColWidths(filteredBooksData);
     XLSX.utils.book_append_sheet(workbook, worksheet, `Books`);
 const excelBuffer = XLSX.write(workbook, {
      bookType: 'xlsx',
      type: 'array',
    });

    const blob = new Blob([excelBuffer], {
      type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    });
      const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = `bookList.xlsx`;
    a.click();
    URL.revokeObjectURL(url);
}
</script>
