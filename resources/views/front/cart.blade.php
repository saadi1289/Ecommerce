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
    <div class="relative flex size-full min-h-screen flex-col bg-white group/design-root overflow-x-hidden" style='font-family: "Plus Jakarta Sans", "Noto Sans", sans-serif;'>
      <div class="layout-container flex h-full grow flex-col">
        <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-[#f4f0f0] px-10 py-3">
          <div class="flex items-center gap-8">
            <div class="flex items-center gap-4 text-[#181111]">
              <div class="size-4">
                <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M44 11.2727C44 14.0109 39.8386 16.3957 33.69 17.6364C39.8386 18.877 44 21.2618 44 24C44 26.7382 39.8386 29.123 33.69 30.3636C39.8386 31.6043 44 33.9891 44 36.7273C44 40.7439 35.0457 44 24 44C12.9543 44 4 40.7439 4 36.7273C4 33.9891 8.16144 31.6043 14.31 30.3636C8.16144 29.123 4 26.7382 4 24C4 21.2618 8.16144 18.877 14.31 17.6364C8.16144 16.3957 4 14.0109 4 11.2727C4 7.25611 12.9543 4 24 4C35.0457 4 44 7.25611 44 11.2727Z"
                    fill="currentColor"
                  ></path>
                </svg>
              </div>
              <h2 class="text-[#181111] text-lg font-bold leading-tight tracking-[-0.015em]">ShopAll</h2>
            </div>
            <div class="flex items-center gap-9">
              <a class="text-[#181111] text-sm font-medium leading-normal" href="#">New Arrivals</a>
              <a class="text-[#181111] text-sm font-medium leading-normal" href="#">Featured</a>
              <a class="text-[#181111] text-sm font-medium leading-normal" href="#">Men</a>
              <a class="text-[#181111] text-sm font-medium leading-normal" href="#">Women</a>
              <a class="text-[#181111] text-sm font-medium leading-normal" href="#">Accessories</a>
              <a class="text-[#181111] text-sm font-medium leading-normal" href="#">Sale</a>
            </div>
          </div>
          <div class="flex flex-1 justify-end gap-8">
            <label class="flex flex-col min-w-40 !h-10 max-w-64">
              <div class="flex w-full flex-1 items-stretch rounded-lg h-full">
                <div
                  class="text-[#886364] flex border-none bg-[#f4f0f0] items-center justify-center pl-4 rounded-l-lg border-r-0"
                  data-icon="MagnifyingGlass"
                  data-size="24px"
                  data-weight="regular"
                >
                  <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                    <path
                      d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"
                    ></path>
                  </svg>
                </div>
                <input
                  placeholder="Search"
                  class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#181111] focus:outline-0 focus:ring-0 border-none bg-[#f4f0f0] focus:border-none h-full placeholder:text-[#886364] px-4 rounded-l-none border-l-0 pl-2 text-base font-normal leading-normal"
                  value=""
                />
              </div>
            </label>
            <div class="flex gap-2">
              <button
                class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 bg-[#f4f0f0] text-[#181111] gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-2.5"
              >
                <div class="text-[#181111]" data-icon="Heart" data-size="20px" data-weight="regular">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                    <path
                      d="M178,32c-20.65,0-38.73,8.88-50,23.89C116.73,40.88,98.65,32,78,32A62.07,62.07,0,0,0,16,94c0,70,103.79,126.66,108.21,129a8,8,0,0,0,7.58,0C136.21,220.66,240,164,240,94A62.07,62.07,0,0,0,178,32ZM128,206.8C109.74,196.16,32,147.69,32,94A46.06,46.06,0,0,1,78,48c19.45,0,35.78,10.36,42.6,27a8,8,0,0,0,14.8,0c6.82-16.67,23.15-27,42.6-27a46.06,46.06,0,0,1,46,46C224,147.61,146.24,196.15,128,206.8Z"
                    ></path>
                  </svg>
                </div>
              </button>
              <button
                class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 bg-[#f4f0f0] text-[#181111] gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-2.5"
              >
                <div class="text-[#181111]" data-icon="ShoppingBag" data-size="20px" data-weight="regular">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                    <path
                      d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40Zm0,160H40V56H216V200ZM176,88a48,48,0,0,1-96,0,8,8,0,0,1,16,0,32,32,0,0,0,64,0,8,8,0,0,1,16,0Z"
                    ></path>
                  </svg>
                </div>
              </button>
            </div>
          </div>
        </header>
        <div class="px-40 flex flex-1 justify-center py-5">
          <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
            <div class="flex flex-wrap gap-2 p-4">
              <a class="text-[#886364] text-base font-medium leading-normal" href="#">Home</a>
              <span class="text-[#886364] text-base font-medium leading-normal">/</span>
              <span class="text-[#181111] text-base font-medium leading-normal">Shopping Cart</span>
            </div>
            <div class="flex flex-wrap justify-between gap-3 p-4"><p class="text-[#181111] tracking-light text-[32px] font-bold leading-tight min-w-72">Shopping Cart</p></div>
            <div class="flex items-center gap-4 bg-white px-4 min-h-[72px] py-2 justify-between">
              <div class="flex items-center gap-4">
                <div
                  class="bg-center bg-no-repeat aspect-square bg-cover rounded-lg size-14"
                  style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDb07t4rI3OCPk4pEHmDPO3t-3GXDhO8YAbjPVAC5JFOq5XrmE7EaufzECFJaIetZcoubqiYtv3gxCqAmitqNe7ZJ3ZejVVeDhPGkBnfcJCAfsqxthRJ8BvrdTnzSnBxm4qBi1i4t02MYWx3UK1kw54wM1NB5X-RLctEs81wLAV2s6Lt-c04XqeI5sTKRoU28hDOyrnhS9HECC9SYbzaX5fyQBrsBM-rZpRwnTlCbtURoVeieWY8TVdtKOQ3D3WRtuGQ4bWinCBj4I");'
                ></div>
                <div class="flex flex-col justify-center">
                  <p class="text-[#181111] text-base font-medium leading-normal line-clamp-1">Classic White Tee</p>
                  <p class="text-[#886364] text-sm font-normal leading-normal line-clamp-2">$25.00</p>
                </div>
              </div>
              <div class="shrink-0">
                <div class="flex items-center gap-2 text-[#181111]">
                  <button class="text-base font-medium leading-normal flex h-7 w-7 items-center justify-center rounded-full bg-[#f4f0f0] cursor-pointer">-</button>
                  <input
                    class="text-base font-medium leading-normal w-4 p-0 text-center bg-transparent focus:outline-0 focus:ring-0 focus:border-none border-none [appearance:textfield] [&amp;::-webkit-inner-spin-button]:appearance-none [&amp;::-webkit-outer-spin-button]:appearance-none"
                    type="number"
                    value="1"
                  />
                  <button class="text-base font-medium leading-normal flex h-7 w-7 items-center justify-center rounded-full bg-[#f4f0f0] cursor-pointer">+</button>
                </div>
              </div>
            </div>
            <div class="flex items-center gap-4 bg-white px-4 min-h-[72px] py-2 justify-between">
              <div class="flex items-center gap-4">
                <div
                  class="bg-center bg-no-repeat aspect-square bg-cover rounded-lg size-14"
                  style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBqzRcJSfGSeJ68Xhy2vrg1OVPVCNiZgLZzN2XW8z4Va5Evwr7ksG7lmNslC3iulmsA6R9zoO-G12XExOS2uZbgFSCcroBz4mGlGTZaVhIag-MCCHyEKPMMhuvY0nsaQ6XXYdORL0ZrzkNH6q9yowa212oRJ-iN8iSW9uXxT1_pBESYvHuf3M1yspMC2-XSijrAzRs_dX08m6IQoz_E-m5FE3c6wPCockWcRtLab5adJ82Wydj4dvrQhy5WBbwxKjQgQMXy8zoxH3s");'
                ></div>
                <div class="flex flex-col justify-center">
                  <p class="text-[#181111] text-base font-medium leading-normal line-clamp-1">Slim Fit Jeans</p>
                  <p class="text-[#886364] text-sm font-normal leading-normal line-clamp-2">$35.00</p>
                </div>
              </div>
              <div class="shrink-0">
                <div class="flex items-center gap-2 text-[#181111]">
                  <button class="text-base font-medium leading-normal flex h-7 w-7 items-center justify-center rounded-full bg-[#f4f0f0] cursor-pointer">-</button>
                  <input
                    class="text-base font-medium leading-normal w-4 p-0 text-center bg-transparent focus:outline-0 focus:ring-0 focus:border-none border-none [appearance:textfield] [&amp;::-webkit-inner-spin-button]:appearance-none [&amp;::-webkit-outer-spin-button]:appearance-none"
                    type="number"
                    value="1"
                  />
                  <button class="text-base font-medium leading-normal flex h-7 w-7 items-center justify-center rounded-full bg-[#f4f0f0] cursor-pointer">+</button>
                </div>
              </div>
            </div>
            <div class="flex items-center gap-4 bg-white px-4 min-h-[72px] py-2 justify-between">
              <div class="flex items-center gap-4">
                <div
                  class="bg-center bg-no-repeat aspect-square bg-cover rounded-lg size-14"
                  style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuD1DprVsQ2GthI9q6ifP53eER6kPVwqCz5INlnv8ciFYUjP57ltrze-2yvv87oCaehjQpzBS3aoPaqBoaoZr6fL753jVRB0fwFCMOvpn3zbqVKbYoawDrPiah_qxE2ezoZT_FZ9afnF0Zm5XuYCZAwIRhXUvBDbP6n4QWunrS7otX697GRMNQdjWz8sEXl91_fjp0DQTETXOUIh6to0QVYKz26ZfQDSCAEwDtxtOQ2HiEqtR_lCU4Kue_yCVZ3h4cz0WYPPnugt46U");'
                ></div>
                <div class="flex flex-col justify-center">
                  <p class="text-[#181111] text-base font-medium leading-normal line-clamp-1">Basic Socks</p>
                  <p class="text-[#886364] text-sm font-normal leading-normal line-clamp-2">$15.00</p>
                </div>
              </div>
              <div class="shrink-0">
                <div class="flex items-center gap-2 text-[#181111]">
                  <button class="text-base font-medium leading-normal flex h-7 w-7 items-center justify-center rounded-full bg-[#f4f0f0] cursor-pointer">-</button>
                  <input
                    class="text-base font-medium leading-normal w-4 p-0 text-center bg-transparent focus:outline-0 focus:ring-0 focus:border-none border-none [appearance:textfield] [&amp;::-webkit-inner-spin-button]:appearance-none [&amp;::-webkit-outer-spin-button]:appearance-none"
                    type="number"
                    value="3"
                  />
                  <button class="text-base font-medium leading-normal flex h-7 w-7 items-center justify-center rounded-full bg-[#f4f0f0] cursor-pointer">+</button>
                </div>
              </div>
            </div>
            <h3 class="text-[#181111] text-lg font-bold leading-tight tracking-[-0.015em] px-4 pb-2 pt-4">Order Summary</h3>
            <div class="p-4">
              <div class="flex justify-between gap-x-6 py-2">
                <p class="text-[#886364] text-sm font-normal leading-normal">Subtotal</p>
                <p class="text-[#181111] text-sm font-normal leading-normal text-right">$75.00</p>
              </div>
              <div class="flex justify-between gap-x-6 py-2">
                <p class="text-[#886364] text-sm font-normal leading-normal">Shipping</p>
                <p class="text-[#181111] text-sm font-normal leading-normal text-right">$5.00</p>
              </div>
              <div class="flex justify-between gap-x-6 py-2">
                <p class="text-[#886364] text-sm font-normal leading-normal">Taxes</p>
                <p class="text-[#181111] text-sm font-normal leading-normal text-right">$7.50</p>
              </div>
              <div class="flex justify-between gap-x-6 py-2">
                <p class="text-[#886364] text-sm font-normal leading-normal">Total</p>
                <p class="text-[#181111] text-sm font-normal leading-normal text-right">$87.50</p>
              </div>
            </div>
            <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
              <label class="flex flex-col min-w-40 flex-1">
                <input
                  placeholder="Discount code"
                  class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#181111] focus:outline-0 focus:ring-0 border border-[#e5dcdc] bg-white focus:border-[#e5dcdc] h-14 placeholder:text-[#886364] p-[15px] text-base font-normal leading-normal"
                  value=""
                />
              </label>
            </div>
            <div class="flex justify-stretch">
              <div class="flex flex-1 gap-3 flex-wrap px-4 py-3 justify-between">
                <button
                  class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-[#f4f0f0] text-[#181111] text-sm font-bold leading-normal tracking-[0.015em]"
                >
                  <span class="truncate">Continue Shopping</span>
                </button>
                <button
                  class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-[#e92932] text-white text-sm font-bold leading-normal tracking-[0.015em]"
                >
                  <span class="truncate">Proceed to Checkout</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
