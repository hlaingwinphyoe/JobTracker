<template>
  <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
    <a href="#">
      <img class="rounded-t-lg" src="https://placehold.co/400x250" alt="" />
    </a>
    <div class="p-5">
      <div class="flex items-center justify-between mb-4">
        <div class="flex gap-1.5 items-center">
          <img
            class="flex-shrink-0 w-8 h-8 rounded-full"
            src="https://i.imgur.com/7D7I6dI.png"
            alt=""
          />
          <div class="flex">
            <span class="text-sm">Jessica Parker</span>
            <!-- <span class="text-sm text-gray-500 mb-3">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="icon icon-tabler icon-tabler-briefcase inline-flex items-center mb-[3px] text-primary-500"
                width="15"
                height="15"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path
                  d="M3 7m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"
                />
                <path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2" />
                <path d="M12 12l0 .01" />
                <path d="M3 13a20 20 0 0 0 18 0" />
              </svg>
              Software Company
            </span> -->
          </div>
        </div>
        <span>
          <a
            href="#"
            class="bg-tertiary-100 hover:bg-tertiary-200 text-tertiary-800 text-xs font-semibold px-2.5 py-1 rounded border border-tertiary-400 whitespace-nowrap"
            >Full Time</a
          >
        </span>
      </div>
      <a href="#">
        <h5 class="mb-4 text-lg capitalize hover:underline">
          Senior Software Engineer
        </h5>
      </a>

      <div class="mb-3 flex justify-between items-center">
        <span class="text-sm me-3 text-gray-500 mb-3">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="icon icon-tabler icon-tabler-clock-hour-3 inline-flex items-center mb-[3px]"
            width="15"
            height="15"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
            <path d="M12 12h3.5" />
            <path d="M12 7v5" />
          </svg>
          1 hour ago
        </span>
        <span class="text-sm text-gray-500 mb-3">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="icon icon-tabler icon-tabler-location inline-flex items-center mb-[3px]"
            width="15"
            height="15"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path
              d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5"
            />
          </svg>
          Mandalay
        </span>
      </div>

      <div class="flex items-center justify-between">
        <h5 class="text-lg text-primary-500 font-semibold">
          500 Lakhs<span class="text-sm text-gray-500 font-light">/Month</span>
        </h5>
        <span>
          <div
            id="save-tooltip"
            role="tooltip"
            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700"
          >
            Saved Post
            <div class="tooltip-arrow" data-popper-arrow></div>
          </div>
          <a href="javascript:void(0)" data-tooltip-target="save-tooltip">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="icon icon-tabler icon-tabler-heart text-gray-500"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              fill="none"
              stroke-linecap="round"
              stroke-linejoin="round"
            >
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path
                d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"
              />
            </svg>
          </a>
        </span>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style></style>
