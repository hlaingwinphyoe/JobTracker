<template>
  <section
    id="searchModal"
    class="overflow-x-hidden fixed top-0 left-0 w-full h-full inset-0 z-50"
    v-if="open"
  >
    <div
      class="relative md:px-4 md:flex md:items-center md:justify-center min-h-full"
    >
      <div
        class="bg-secondary-500 bg-opacity-70 w-full h-full absolute z-10 overscroll-contain"
        @click.prevent="closeModal"
      ></div>

      <div
        class="bg-white rounded-3xl md:p-4 z-50 md:m-4 relative h-auto md:min-h-fit w-full md:max-w-xl"
        style="min-height: 104vh;"
      >
        <div class="p-6 space-y-6 mb-5">
          <div>
            <div class="flex items-center justify-center">
              <img src="/logo-notext.svg" class="h-16 w-16" alt="" />
              <h4 class="text-2xl font-semibold text-secondary-600">
                {{ siteName }}
              </h4>
            </div>
            <div>
              <h3
                class="text-xl uppercase font-bold text-center text-primary-500 underline underline-offset-2"
              >
<<<<<<< HEAD
                Join Us
              </h3>
            </div>
          </div>
          <button
            @click="closeModal"
            class="absolute top-0 right-5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
          >
            <svg
              class="w-3 h-3"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 14 14"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
              />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>

          <div class="space-y-6">
            <div>
              <label
                for="username"
                class="block mb-2 text-sm font-medium text-gray-500"
                >Username <span class="text-red-500">*</span></label
              >
              <div class="relative">
                <div
                  class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="icon icon-tabler icon-tabler-user-square-rounded text-primary-500"
                    width="17"
                    height="17"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 13a3 3 0 1 0 0 -6a3 3 0 0 0 0 6z" />
                    <path
                      d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z"
                    />
                    <path
                      d="M6 20.05v-.05a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v.05"
                    />
                  </svg>
                </div>

                <input
                  name="name"
                  v-model="form.name"
                  type="text"
                  class="bg-transparent caret-gray-500 border text-sm border-gray-400 text-gray-500 rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-9 p-2.5"
                  placeholder="Username"
                />
              </div>
              <span v-if="errors.name" class="text-xs text-red-500">{{
                errors.name[0]
              }}</span>
            </div>

            <div class="grid gap-3 md:grid-cols-2">
              <div>
                <label
                  for="email"
                  class="block mb-2 text-sm font-medium text-gray-500"
                  >Email <span class="text-red-500">*</span></label
                >
                <div class="relative">
                  <div
                    class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="icon icon-tabler icon-tabler-mail text-primary-500"
                      width="17"
                      height="17"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="currentColor"
                      fill="none"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    >
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path
                        d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z"
                      />
                      <path d="M3 7l9 6l9 -6" />
                    </svg>
                  </div>

                  <input
                    name="email"
                    v-model="form.email"
                    type="text"
                    class="bg-transparent caret-gray-500 border text-sm border-gray-400 text-gray-500 rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-9 p-2.5"
                    placeholder="Email"
                  />
                </div>
                <span v-if="errors.email" class="text-xs text-red-500">{{
                  errors.email[0]
                }}</span>
              </div>

              <div>
                <label
                  for="phone"
                  class="block mb-2 text-sm font-medium text-gray-500"
                  >Phone Number <span class="text-red-500">*</span></label
                >
                <div class="relative">
                  <div
                    class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="icon icon-tabler icon-tabler-phone text-primary-500"
                      width="17"
                      height="17"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="currentColor"
                      fill="none"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    >
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path
                        d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2"
                      />
                    </svg>
                  </div>
                  <input
                    name="phone"
                    type="text"
                    v-model="form.phone"
                    class="bg-transparent caret-gray-500 border text-sm border-gray-400 text-gray-500 rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-9 p-2.5"
                    placeholder="Phone"
                  />
                </div>
                <span v-if="errors.phone" class="text-xs text-red-500">{{
                  errors.phone[0]
                }}</span>
              </div>
            </div>

            <div>
              <label
                for="password"
                class="block mb-2 text-sm font-medium text-gray-500"
                >Password <span class="text-red-500">*</span></label
              >
              <div class="relative">
                <div
                  class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="icon icon-tabler icon-tabler-lock-access text-primary-500"
                    width="17"
                    height="17"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M4 8v-2a2 2 0 0 1 2 -2h2" />
                    <path d="M4 16v2a2 2 0 0 0 2 2h2" />
                    <path d="M16 4h2a2 2 0 0 1 2 2v2" />
                    <path d="M16 20h2a2 2 0 0 0 2 -2v-2" />
                    <path
                      d="M8 11m0 1a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v3a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1z"
                    />
                    <path d="M10 11v-2a2 2 0 1 1 4 0v2" />
                  </svg>
                </div>
                <input
                  name="password"
                  :type="passwordField"
                  v-model="form.password"
                  class="bg-transparent caret-gray-500 border text-sm border-gray-400 text-gray-500 rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-9 p-2.5"
                  placeholder="Password"
                />
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-5 h-5 absolute cursor-pointer top-3 right-3 text-gray-400"
                  @click="showPassword"
                >
                  <path
                    v-if="passwordField === 'password'"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88"
                  />
                  <path
                    v-else
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"
                  />
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                  />
                </svg>
              </div>
              <span v-if="errors.password" class="text-xs text-red-500">{{
                errors.password[0]
              }}</span>
            </div>

            <!-- Company -->
            <div class="grid gap-3 md:grid-cols-3">
              <div>
                <label
                  for="company Name"
                  class="block mb-2 text-sm font-medium text-gray-500"
                  >Company Name <span class="text-red-500">*</span></label
                >
                <div class="relative">
                  <div
                    class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="icon icon-tabler icon-tabler-briefcase text-primary-500"
                      width="17"
                      height="17"
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
                  </div>

                  <input
                    name="company_name"
                    v-model="form.company_name"
                    type="text"
                    class="bg-transparent caret-gray-500 border text-sm border-gray-400 text-gray-500 rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-9 p-2.5"
                    placeholder="Company Name"
                  />
                </div>
                <span v-if="errors.company_name" class="text-xs text-red-500">{{
                  errors.company_name[0]
                }}</span>
              </div>
              <div>
                <label
                  for="company Type"
                  class="block mb-2 text-sm font-medium text-gray-500"
                  >Company Type <span class="text-red-500">*</span></label
                >
                <div class="relative">
                  <div
                    class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"
                  >
                  <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="icon icon-tabler icon-tabler-triangle-square-circle text-primary-500"
                      width="17"
                      height="17"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="currentColor"
                      fill="none"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    >
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M12 3l-4 7h8z" />
                      <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                      <path
                        d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"
                      />
                    </svg>
                  </div>

                  <input
                    name="company_type"
                    v-model="form.company_type"
                    type="text"
                    class="bg-transparent caret-gray-500 border text-sm border-gray-400 text-gray-500 rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-9 p-2.5"
                    placeholder="Company Name"
                  />
                </div>
                <span v-if="errors.company_type" class="text-xs text-red-500">{{
                  errors.company_type[0]
                }}</span>
              </div>
              <div>
                <label
                  for=""
                  class="block mb-2 text-sm font-medium text-gray-500"
                  >Region <span class="text-red-500">*</span></label
                >
                <div class="relative">
                  <div
                    class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="icon icon-tabler icon-tabler-world text-primary-500"
                      width="17"
                      height="17"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="currentColor"
                      fill="none"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    >
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                      <path d="M3.6 9h16.8" />
                      <path d="M3.6 15h16.8" />
                      <path d="M11.5 3a17 17 0 0 0 0 18" />
                      <path d="M12.5 3a17 17 0 0 1 0 18" />
                    </svg>
                  </div>
                  <select
                    name="region"
                    v-model="form.region"
                    class="bg-transparent caret-gray-500 border text-sm border-gray-400 text-gray-500 rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-9 p-2.5"
                  >
                    <option selected disabled>Choose Region</option>
                    <option
                      :value="region.id"
                      v-for="region in regionList"
                      :key="region.id"
                    >
                      {{ region.name }}
                    </option>
                  </select>
                </div>
                <span v-if="errors.region" class="text-xs text-red-500">{{
                  errors.region[0]
                }}</span>
              </div>
            </div>

            <div>
              <label
                for="desc"
                class="block mb-2 text-sm font-medium text-gray-500"
                >Company Description</label
              >
              <textarea
                id="desc"
                rows="4"
                v-model="form.desc"
                class="block p-2.5 w-full text-sm text-gray-500 bg-transparent rounded-lg border border-gray-400 focus:ring-primary-500 focus:border-primary-500"
                placeholder="Write your description here..."
              ></textarea>
            </div>
            <button
              @click="onSubmit"
              type="button"
              class="w-full normal-font text-white bg-primary-500 hover:bg-primary-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
            >
              Sign Up
            </button>
          </div>
          <div class="text-sm font-medium text-gray-500 normal-font">
            Already have an account?
            <a
              href="javascript:void(0)"
              class="text-primary-500 hover:underline normal-font"
              >Login
            </a>
=======
                Join Us Now!
              </h3>
            </div>
          </div>
          <button
            @click="closeModal"
            class="absolute top-0 right-5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
          >
            <svg
              class="w-3 h-3"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 14 14"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
              />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>

          <div class="layout">
            <div class="logo">
              <img src="logo.png" alt="">
            </div>
            <div class="content">
              <form @submit="onSubmit" class="space-y-6">
                <div>
                  <label
                    for="username"
                    class="block mb-2 text-sm font-medium text-gray-500"
                    >Username <span class="text-red-500">*</span></label
                  >
                  <div class="relative">
                    <div
                      class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="icon icon-tabler icon-tabler-user-square-rounded text-primary-500"
                        width="17"
                        height="17"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      >
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 13a3 3 0 1 0 0 -6a3 3 0 0 0 0 6z" />
                        <path
                          d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z"
                        />
                        <path
                          d="M6 20.05v-.05a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v.05"
                        />
                      </svg>
                    </div>

                    <input
                      name="name"
                      v-model="form.name"
                      type="text"
                      class="bg-transparent caret-gray-500 border text-sm border-gray-400 text-gray-500 rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5"
                      placeholder="Username"
                    />
                  </div>
                  <!-- <span class="text-xs text-red-500">{{
                errors
              }}</span> -->
                </div>

                <div class="grid gap-3 md:grid-cols-2">
                  <div>
                    <label
                      for="email"
                      class="block mb-2 text-sm font-medium text-gray-500"
                      >Email <span class="text-red-500">*</span></label
                    >
                    <div class="relative">
                      <div
                        class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          class="icon icon-tabler icon-tabler-mail text-primary-500"
                          width="17"
                          height="17"
                          viewBox="0 0 24 24"
                          stroke-width="1.5"
                          stroke="currentColor"
                          fill="none"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        >
                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                          <path
                            d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z"
                          />
                          <path d="M3 7l9 6l9 -6" />
                        </svg>
                      </div>

                      <input
                        name="email"
                        v-model="form.email"
                        type="text"
                        class="bg-transparent caret-gray-500 border text-sm border-gray-400 text-gray-500 rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5"
                        placeholder="Email"
                      />
                    </div>
                    <!-- <span class="text-xs text-red-500">{{
                errors
              }}</span> -->
                  </div>

                  <div>
                    <label
                      for="phone"
                      class="block mb-2 text-sm font-medium text-gray-500"
                      >Phone Number <span class="text-red-500">*</span></label
                    >
                    <div class="relative">
                      <div
                        class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          class="icon icon-tabler icon-tabler-phone text-primary-500"
                          width="17"
                          height="17"
                          viewBox="0 0 24 24"
                          stroke-width="1.5"
                          stroke="currentColor"
                          fill="none"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        >
                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                          <path
                            d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2"
                          />
                        </svg>
                      </div>
                      <input
                        name="phone"
                        type="text"
                        v-model="form.phone"
                        class="bg-transparent caret-gray-500 border text-sm border-gray-400 text-gray-500 rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5"
                        placeholder="Phone"
                      />
                    </div>
                    <span class="text-xs text-red-500">{{ errors.phone }}</span>
                  </div>
                </div>

                <div>
                  <label
                    for="password"
                    class="block mb-2 text-sm font-medium text-gray-500"
                    >Password <span class="text-red-500">*</span></label
                  >
                  <div class="relative">
                    <div
                      class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="icon icon-tabler icon-tabler-lock-access text-primary-500"
                        width="17"
                        height="17"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      >
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4 8v-2a2 2 0 0 1 2 -2h2" />
                        <path d="M4 16v2a2 2 0 0 0 2 2h2" />
                        <path d="M16 4h2a2 2 0 0 1 2 2v2" />
                        <path d="M16 20h2a2 2 0 0 0 2 -2v-2" />
                        <path
                          d="M8 11m0 1a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v3a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1z"
                        />
                        <path d="M10 11v-2a2 2 0 1 1 4 0v2" />
                      </svg>
                    </div>
                    <input
                      name="password"
                      :type="passwordField"
                      v-model="form.password"
                      class="bg-transparent caret-gray-500 border text-sm border-gray-400 text-gray-500 rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5"
                      placeholder="Password"
                    />
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="currentColor"
                      class="w-5 h-5 absolute cursor-pointer top-3 right-3 text-gray-400"
                      @click="showPassword"
                    >
                      <path
                        v-if="passwordField === 'password'"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88"
                      />
                      <path
                        v-else
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"
                      />
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                      />
                    </svg>
                  </div>
                  <span class="text-xs text-red-500">{{
                    errors.password
                  }}</span>
                </div>

                <!-- Company -->
                <div class="grid gap-3 md:grid-cols-3">
                  <div>
                    <label
                      for="company Name"
                      class="block mb-2 text-sm font-medium text-gray-500"
                      >Company Name <span class="text-red-500">*</span></label
                    >
                    <div class="relative">
                      <div
                        class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          class="icon icon-tabler icon-tabler-briefcase text-primary-500"
                          width="17"
                          height="17"
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
                      </div>

                      <input
                        name="company_name"
                        v-model="form.company_name"
                        type="text"
                        class="bg-transparent caret-gray-500 border text-sm border-gray-400 text-gray-500 rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5"
                        placeholder="Company Name"
                      />
                    </div>
                    <!-- <span class="text-xs text-red-500">{{
                errors
              }}</span> -->
                  </div>
                  <div>
                    <label
                      for=""
                      class="block mb-2 text-sm font-medium text-gray-500"
                      >Company Type <span class="text-red-500">*</span></label
                    >
                    <div class="relative">
                      <div
                        class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          class="icon icon-tabler icon-tabler-triangle-square-circle text-primary-500"
                          width="17"
                          height="17"
                          viewBox="0 0 24 24"
                          stroke-width="1.5"
                          stroke="currentColor"
                          fill="none"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        >
                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                          <path d="M12 3l-4 7h8z" />
                          <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                          <path
                            d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"
                          />
                        </svg>
                      </div>
                      <select
                        name="company_type"
                        v-model="form.company_type"
                        class="bg-transparent caret-gray-500 border text-sm border-gray-400 text-gray-500 rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5"
                      >
                        <option selected disabled>Choose Country Code</option>
                        <option value="+95">🇲🇲&emsp;Myanmar (+95)</option>
                        <option value="+66">🇹🇭&emsp;Thai (+66)</option>
                      </select>
                    </div>
                    <!-- <span class="text-xs text-red-500">{{
                  errors.company Type
                }}</span> -->
                  </div>
                  <div>
                    <label
                      for=""
                      class="block mb-2 text-sm font-medium text-gray-500"
                      >Region <span class="text-red-500">*</span></label
                    >
                    <div class="relative">
                      <div
                        class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          class="icon icon-tabler icon-tabler-world text-primary-500"
                          width="17"
                          height="17"
                          viewBox="0 0 24 24"
                          stroke-width="1.5"
                          stroke="currentColor"
                          fill="none"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        >
                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                          <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                          <path d="M3.6 9h16.8" />
                          <path d="M3.6 15h16.8" />
                          <path d="M11.5 3a17 17 0 0 0 0 18" />
                          <path d="M12.5 3a17 17 0 0 1 0 18" />
                        </svg>
                      </div>
                      <select
                        name="region"
                        v-model="form.region"
                        class="bg-transparent caret-gray-500 border text-sm border-gray-400 text-gray-500 rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5"
                      >
                        <option selected disabled>Choose Region</option>
                        <option
                          :value="region.id"
                          v-for="region in regionList"
                          :key="region.id"
                        >
                          {{ region.name }}
                        </option>
                      </select>
                    </div>
                    <!-- <span class="text-xs text-red-500">{{
                  errors.region
                }}</span> -->
                  </div>
                </div>

                <button
                  type="submit"
                  class="w-full normal-font text-white bg-primary-500 hover:bg-primary-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                >
                  Sign Up
                </button>
              </form>
              <div class="text-sm font-medium text-gray-500 normal-font">
                Already have an account?
                <a
                  href="javascript:void(0)"
                  @click="$emit('openRegister')"
                  class="text-primary-500 hover:underline normal-font"
                  >Login
                </a>
              </div>
            </div>
>>>>>>> 92c78d3e2bb8d5c800be1f208e7b199335604ed4
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { computed, onMounted, reactive, toRaw, toRefs } from "vue";
export default {
  props: ["open"],
  emits: ["update:open"],
  setup(props, { emit }) {
    const state = reactive({
      passwordField: "password",
      form: {
        name: "",
        phone: "",
        email: "",
        password: "",
        company_name: "",
        company_type: "",
        region: "",
        desc: "",
      },
      isLoading: false,
      regionList: [],
      errors: [],
    });

    const showPassword = () => {
      state.passwordField =
        state.passwordField === "password" ? "text" : "password";
    };

    const onSubmit = () => {
      state.isLoading = true;
      axios
        .post("/wapi/employer-register", state.form)
        .then((res) => {
          state.isLoading = false;
<<<<<<< HEAD
          console.log("sign in");
=======
>>>>>>> 92c78d3e2bb8d5c800be1f208e7b199335604ed4
          closeModal();
          setTimeout(() => {
            location.reload();
          }, 500);
        })
        .catch((err) => {
          state.isLoading = false;
          if (err.response.status === 422) {
            state.errors = toRaw(err.response.data.errors);
          }
        });
    };

    const closeModal = () => {
      emit("update:open", false);
      state.form = {
        name: "",
        phone: "",
        email: "",
        password: "",
        company_name: "",
        company_type: "",
        region: "",
        desc: "",
      };
      document.body.classList.remove("overflow-hidden");
    };

    onMounted(() => {
      axios.get("/wapi/get-regions").then((res) => {
        state.regionList = res.data.regions;
      });
    });

    return {
      ...toRefs(state),
      closeModal,
      showPassword,
      onSubmit,
      siteName: computed(() => import.meta.env.VITE_APP_NAME),
    };
  },
};
</script>
<<<<<<< HEAD
=======

<style scoped>
.layout {
  display: grid;
  grid-template-rows: auto auto;
  grid-template-columns: 16rem minmax(0, 1fr);
}

.logo{
  grid-row: 2;
  grid-column: 1;
}

.content{
  grid-row: 2;
  grid-column: 2;
}
</style>
>>>>>>> 92c78d3e2bb8d5c800be1f208e7b199335604ed4
