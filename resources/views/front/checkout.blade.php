<html>
  <head>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link
      rel="stylesheet"
      as="style"
      onload="this.rel='stylesheet'"
      href="https://fonts.googleapis.com/css2?display=swap&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900&amp;family=Plus+Jakarta+Sans%3Awght%40400%3B500%3B700%3B800"
    />

    <title>Stitch Design</title>
    <link rel="icon" type="image/x-icon" href="data:image/x-icon;base64," />

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  </head>
  <body>
    <div
      class="relative flex size-full min-h-screen flex-col bg-white group/design-root overflow-x-hidden"
      style="--checkbox-tick-svg: url('data:image/svg+xml,%3csvg viewBox=%270 0 16 16%27 fill=%27rgb(255,255,255)%27 xmlns=%27http://www.w3.org/2000/svg%27%3e%3cpath d=%27M12.207 4.793a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-2-2a1 1 0 011.414-1.414L6.5 9.086l4.293-4.293a1 1 0 011.414 0z%27/%3e%3c/svg%3e'); --select-button-svg: url('data:image/svg+xml,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 width=%2724px%27 height=%2724px%27 fill=%27rgb(136,99,100)%27 viewBox=%270 0 256 256%27%3e%3cpath d=%27M181.66,170.34a8,8,0,0,1,0,11.32l-48,48a8,8,0,0,1-11.32,0l-48-48a8,8,0,0,1,11.32-11.32L128,212.69l42.34-42.35A8,8,0,0,1,181.66,170.34Zm-96-84.68L128,43.31l42.34,42.35a8,8,0,0,0,11.32-11.32l-48-48a8,8,0,0,0-11.32,0l-48,48A8,8,0,0,0,85.66,85.66Z%27%3e%3c/path%3e%3c/svg%3e'); font-family: &quot;Plus Jakarta Sans&quot;, &quot;Noto Sans&quot;, sans-serif;"
    >
      <div class="layout-container flex h-full grow flex-col">
        <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-[#f4f0f0] px-10 py-3">
          <div class="flex items-center gap-4 text-[#181111]">
            <div class="size-4">
              <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M24 4C25.7818 14.2173 33.7827 22.2182 44 24C33.7827 25.7818 25.7818 33.7827 24 44C22.2182 33.7827 14.2173 25.7818 4 24C14.2173 22.2182 22.2182 14.2173 24 4Z"
                  fill="currentColor"
                ></path>
              </svg>
            </div>
            <h2 class="text-[#181111] text-lg font-bold leading-tight tracking-[-0.015em]">Glint</h2>
          </div>
        </header>
        <div class="gap-1 px-6 flex flex-1 justify-center py-5">
          <div class="layout-content-container flex flex-col max-w-[920px] flex-1">
            <div class="flex flex-wrap gap-2 p-4">
              <a class="text-[#886364] text-base font-medium leading-normal" href="#">Cart</a>
              <span class="text-[#886364] text-base font-medium leading-normal">/</span>
              <a class="text-[#886364] text-base font-medium leading-normal" href="#">Shipping</a>
              <span class="text-[#886364] text-base font-medium leading-normal">/</span>
              <span class="text-[#181111] text-base font-medium leading-normal">Payment</span>
            </div>
            <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
              <label class="flex flex-col min-w-40 flex-1">
                <input
                  placeholder="Email address"
                  class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#181111] focus:outline-0 focus:ring-0 border-none bg-[#f4f0f0] focus:border-none h-14 placeholder:text-[#886364] p-4 text-base font-normal leading-normal"
                  value=""
                />
              </label>
              <label class="flex flex-col min-w-40 flex-1">
                <input
                  placeholder="Full name"
                  class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#181111] focus:outline-0 focus:ring-0 border-none bg-[#f4f0f0] focus:border-none h-14 placeholder:text-[#886364] p-4 text-base font-normal leading-normal"
                  value=""
                />
              </label>
            </div>
            <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
              <label class="flex flex-col min-w-40 flex-1">
                <input
                  placeholder="Address 1"
                  class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#181111] focus:outline-0 focus:ring-0 border-none bg-[#f4f0f0] focus:border-none h-14 placeholder:text-[#886364] p-4 text-base font-normal leading-normal"
                  value=""
                />
              </label>
              <label class="flex flex-col min-w-40 flex-1">
                <input
                  placeholder="Address 2"
                  class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#181111] focus:outline-0 focus:ring-0 border-none bg-[#f4f0f0] focus:border-none h-14 placeholder:text-[#886364] p-4 text-base font-normal leading-normal"
                  value=""
                />
              </label>
            </div>
            <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
              <label class="flex flex-col min-w-40 flex-1">
                <input
                  placeholder="City"
                  class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#181111] focus:outline-0 focus:ring-0 border-none bg-[#f4f0f0] focus:border-none h-14 placeholder:text-[#886364] p-4 text-base font-normal leading-normal"
                  value=""
                />
              </label>
              <label class="flex flex-col min-w-40 flex-1">
                <input
                  placeholder="State"
                  class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#181111] focus:outline-0 focus:ring-0 border-none bg-[#f4f0f0] focus:border-none h-14 placeholder:text-[#886364] p-4 text-base font-normal leading-normal"
                  value=""
                />
              </label>
            </div>
            <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
              <label class="flex flex-col min-w-40 flex-1">
                <select
                  class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#181111] focus:outline-0 focus:ring-0 border-none bg-[#f4f0f0] focus:border-none h-14 bg-[image:--select-button-svg] placeholder:text-[#886364] p-4 text-base font-normal leading-normal"
                >
                  <option value="one"></option>
                  <option value="two">two</option>
                  <option value="three">three</option>
                </select>
              </label>
            </div>
            <h2 class="text-[#181111] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Payment Method</h2>
            <div class="flex items-center gap-4 bg-white px-4 min-h-14 justify-between">
              <div class="flex items-center gap-4">
                <div class="bg-center bg-no-repeat aspect-video bg-contain h-6 w-10 shrink-0" style='background-image: url("/visa.svg");'></div>
                <p class="text-[#181111] text-base font-normal leading-normal flex-1 truncate">.... 8347</p>
              </div>
              <div class="shrink-0">
                <button
                  class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-8 px-4 bg-[#f4f0f0] text-[#181111] text-sm font-medium leading-normal w-fit"
                >
                  <span class="truncate">Change</span>
                </button>
              </div>
            </div>
            <div class="px-4">
              <label class="flex gap-x-3 py-3 flex-row">
                <input
                  type="checkbox"
                  class="h-5 w-5 rounded border-[#e5dcdc] border-2 bg-transparent text-[#e92932] checked:bg-[#e92932] checked:border-[#e92932] checked:bg-[image:--checkbox-tick-svg] focus:ring-0 focus:ring-offset-0 focus:border-[#e5dcdc] focus:outline-none"
                  checked=""
                />
                <p class="text-[#181111] text-base font-normal leading-normal">Billing Address Same As Shipping</p>
              </label>
            </div>
            <div class="flex px-4 py-3 justify-start">
              <button
                class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-[#e92932] text-white text-sm font-bold leading-normal tracking-[0.015em]"
              >
                <span class="truncate">Place Order</span>
              </button>
            </div>
          </div>
          <div class="layout-content-container flex flex-col w-[360px]">
            <div class="flex items-center gap-4 bg-white px-4 min-h-[72px] py-2">
              <div class="flex flex-col justify-center">
                <p class="text-[#181111] text-base font-medium leading-normal line-clamp-1">Estimated Delivery</p>
                <p class="text-[#886364] text-sm font-normal leading-normal line-clamp-2">Jun 23 - Jun 26</p>
              </div>
            </div>
            <div class="flex items-center gap-4 bg-white px-4 min-h-[72px] py-2">
              <div
                class="bg-center bg-no-repeat aspect-square bg-cover rounded-lg size-14"
                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB3dZsjjRC7gpeoj0rb0a3eIFkpzsMAlgAS0UrrJdIRKCskeQs1KGOXkhc7CxcNo1WehjMib22m2y_cUGidnnO0u68edYKQEXRuIxjsTxtNGDSDefXfT8hHb4odBRkOlnaX1QZjQuw_5NCVeyvgnwyLTy8-o5d_Fou_6e-6WqnaS5CZ4KHcUlsDs_pDN43QqHVMbbFNN3da8eYLUg4e6ktXM0V6E-YMFDfAej3AKfWytRa2iPJSAlnSD-u_la0LntIG3NaLKXsit2s");'
              ></div>
              <div class="flex flex-col justify-center">
                <p class="text-[#181111] text-base font-medium leading-normal line-clamp-1">14k Solid Gold Croissant Ring</p>
                <p class="text-[#886364] text-sm font-normal leading-normal line-clamp-2">Yellow Gold · Size 5</p>
              </div>
            </div>
            <div class="flex items-center gap-4 bg-white px-4 min-h-[72px] py-2">
              <div
                class="bg-center bg-no-repeat aspect-square bg-cover rounded-lg size-14"
                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAgZHrR4vp40SF9w3rD-xME6UfQQwBlWFTtChSmozGOr4MlBbFUx2l9_8oTP1qms2hRfAmoURPoUH_0K3q3pkks5ziRbPS7DDSZ7Jz4wL0uNpWznj0Sl8eT11XJYj0RWRc62D3x6D_oe8D8Kg8ZTQFrWevidHqDoM1-QjWmumsfa1Pu3J-_59T5TZXm-q-ShwLlfDyIZljd9lRsId6e8a42c4DIpuhYG0CLVUx8Ed5suLjuxOMCnyfP0oRcZn4f5Nvep_jf5a1fPpA");'
              ></div>
              <div class="flex flex-col justify-center">
                <p class="text-[#181111] text-base font-medium leading-normal line-clamp-1">14k Solid Gold Hoop Earrings</p>
                <p class="text-[#886364] text-sm font-normal leading-normal line-clamp-2">Platinum Gold</p>
              </div>
            </div>
            <div class="p-4">
              <div class="flex justify-between gap-x-6 py-2">
                <p class="text-[#886364] text-sm font-normal leading-normal">Subtotal</p>
                <p class="text-[#181111] text-sm font-normal leading-normal text-right">$975</p>
              </div>
              <div class="flex justify-between gap-x-6 py-2">
                <p class="text-[#886364] text-sm font-normal leading-normal">Taxes</p>
                <p class="text-[#181111] text-sm font-normal leading-normal text-right">$84</p>
              </div>
              <div class="flex justify-between gap-x-6 py-2">
                <p class="text-[#886364] text-sm font-normal leading-normal">Shipping</p>
                <p class="text-[#181111] text-sm font-normal leading-normal text-right">Free</p>
              </div>
              <div class="flex justify-between gap-x-6 py-2">
                <p class="text-[#886364] text-sm font-normal leading-normal">Promo Code</p>
                <p class="text-[#181111] text-sm font-normal leading-normal text-right">Thanksgiving2023</p>
              </div>
              <div class="flex justify-between gap-x-6 py-2">
                <p class="text-[#886364] text-sm font-normal leading-normal">Total</p>
                <p class="text-[#181111] text-sm font-normal leading-normal text-right">$1,059</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
