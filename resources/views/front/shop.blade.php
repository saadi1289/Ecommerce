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
                <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M44 4H30.6666V17.3334H17.3334V30.6666H4V44H44V4Z" fill="currentColor"></path></svg>
              </div>
              <h2 class="text-[#181111] text-lg font-bold leading-tight tracking-[-0.015em]">StyleHub</h2>
            </div>
            <div class="flex items-center gap-9">
              <a class="text-[#181111] text-sm font-medium leading-normal" href="#">New</a>
              <a class="text-[#181111] text-sm font-medium leading-normal" href="#">Women</a>
              <a class="text-[#181111] text-sm font-medium leading-normal" href="#">Men</a>
              <a class="text-[#181111] text-sm font-medium leading-normal" href="#">Kids</a>
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
            <div
              class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10"
              style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBXIzGIZ1h_VS7uk8Q0AFuHqnqDqDqnYi4xlACFCuspYD4C9MN7QQ4pc8KnDCw4h7XEYcn-cz9sF68McBkrNhyGfSVWdnjosRQ6I7_KZgvBpwSVWRuVHKkSqTw2njTbmf5TM4QevvCy61ziT90EqvGRgok0E-jg2fm5WhEQHG3dUNMQ8eptjdmtojz3DYsdY7xoeB6ZvWwO7jpb6FoPb9160kWBvtCm8pNZgaFZtS_FHiI_dwA3V9aKSKg9QOpkHHH6epdw8AnELgk");'
            ></div>
          </div>
        </header>
        <div class="px-40 flex flex-1 justify-center py-5">
          <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
            <div class="px-4 py-3">
              <label class="flex flex-col min-w-40 h-12 w-full">
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
                    placeholder="Search for products"
                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#181111] focus:outline-0 focus:ring-0 border-none bg-[#f4f0f0] focus:border-none h-full placeholder:text-[#886364] px-4 rounded-l-none border-l-0 pl-2 text-base font-normal leading-normal"
                    value=""
                  />
                </div>
              </label>
            </div>
            <div class="flex gap-3 p-3 flex-wrap pr-4">
              <div class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-[#f4f0f0] pl-2 pr-4">
                <div class="text-[#181111]" data-icon="ListBullets" data-size="20px" data-weight="regular">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                    <path
                      d="M80,64a8,8,0,0,1,8-8H216a8,8,0,0,1,0,16H88A8,8,0,0,1,80,64Zm136,56H88a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Zm0,64H88a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16ZM44,52A12,12,0,1,0,56,64,12,12,0,0,0,44,52Zm0,64a12,12,0,1,0,12,12A12,12,0,0,0,44,116Zm0,64a12,12,0,1,0,12,12A12,12,0,0,0,44,180Z"
                    ></path>
                  </svg>
                </div>
                <p class="text-[#181111] text-sm font-medium leading-normal">Category</p>
              </div>
              <div class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-[#f4f0f0] pl-2 pr-4">
                <div class="text-[#181111]" data-icon="CurrencyDollar" data-size="20px" data-weight="regular">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                    <path
                      d="M152,120H136V56h8a32,32,0,0,1,32,32,8,8,0,0,0,16,0,48.05,48.05,0,0,0-48-48h-8V24a8,8,0,0,0-16,0V40h-8a48,48,0,0,0,0,96h8v64H104a32,32,0,0,1-32-32,8,8,0,0,0-16,0,48.05,48.05,0,0,0,48,48h16v16a8,8,0,0,0,16,0V216h16a48,48,0,0,0,0-96Zm-40,0a32,32,0,0,1,0-64h8v64Zm40,80H136V136h16a32,32,0,0,1,0,64Z"
                    ></path>
                  </svg>
                </div>
                <p class="text-[#181111] text-sm font-medium leading-normal">Price Range</p>
              </div>
              <div class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-[#f4f0f0] pl-2 pr-4">
                <div class="text-[#181111]" data-icon="Ruler" data-size="20px" data-weight="regular">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                    <path
                      d="M235.32,73.37,182.63,20.69a16,16,0,0,0-22.63,0L20.68,160a16,16,0,0,0,0,22.63l52.69,52.68a16,16,0,0,0,22.63,0L235.32,96A16,16,0,0,0,235.32,73.37ZM84.68,224,32,171.31l32-32,26.34,26.35a8,8,0,0,0,11.32-11.32L75.31,128,96,107.31l26.34,26.35a8,8,0,0,0,11.32-11.32L107.31,96,128,75.31l26.34,26.35a8,8,0,0,0,11.32-11.32L139.31,64l32-32L224,84.69Z"
                    ></path>
                  </svg>
                </div>
                <p class="text-[#181111] text-sm font-medium leading-normal">Size</p>
              </div>
              <div class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-[#f4f0f0] pl-2 pr-4">
                <div class="text-[#181111]" data-icon="Swatches" data-size="20px" data-weight="regular">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                    <path
                      d="M80,180a12,12,0,1,1-12-12A12,12,0,0,1,80,180Zm152-23.81V208a16,16,0,0,1-16,16H68a46.36,46.36,0,0,1-7.94-.68,44,44,0,0,1-35.43-50.95l25-143.13a15.94,15.94,0,0,1,18.47-13L122.84,26a16,16,0,0,1,12.92,18.52l-12.08,69L191.49,89a16,16,0,0,1,20.45,9.52L231,150.69A18.35,18.35,0,0,1,232,156.19ZM95,184.87,120,41.74,65.46,32l-25,143.1A28,28,0,0,0,62.9,207.57,27.29,27.29,0,0,0,83.46,203,27.84,27.84,0,0,0,95,184.87ZM108.78,195,216,156.11,196.92,104,120.5,131.7l-9.78,55.92A44.63,44.63,0,0,1,108.78,195ZM216,173.12,119.74,208H216Z"
                    ></path>
                  </svg>
                </div>
                <p class="text-[#181111] text-sm font-medium leading-normal">Color</p>
              </div>
              <div class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-[#f4f0f0] pl-2 pr-4">
                <div class="text-[#181111]" data-icon="Hash" data-size="20px" data-weight="regular">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                    <path
                      d="M224,88H175.4l8.47-46.57a8,8,0,0,0-15.74-2.86l-9,49.43H111.4l8.47-46.57a8,8,0,0,0-15.74-2.86L95.14,88H48a8,8,0,0,0,0,16H92.23L83.5,152H32a8,8,0,0,0,0,16H80.6l-8.47,46.57a8,8,0,0,0,6.44,9.3A7.79,7.79,0,0,0,80,224a8,8,0,0,0,7.86-6.57l9-49.43H144.6l-8.47,46.57a8,8,0,0,0,6.44,9.3A7.79,7.79,0,0,0,144,224a8,8,0,0,0,7.86-6.57l9-49.43H208a8,8,0,0,0,0-16H163.77l8.73-48H224a8,8,0,0,0,0-16Zm-76.5,64H99.77l8.73-48h47.73Z"
                    ></path>
                  </svg>
                </div>
                <p class="text-[#181111] text-sm font-medium leading-normal">Brand</p>
              </div>
            </div>
            <h3 class="text-[#181111] text-lg font-bold leading-tight tracking-[-0.015em] px-4 pb-2 pt-4">Featured Products</h3>
            <div class="grid grid-cols-[repeat(auto-fit,minmax(158px,1fr))] gap-3 p-4">
              <div class="flex flex-col gap-3 pb-3">
                <div
                  class="w-full bg-center bg-no-repeat aspect-[3/4] bg-cover rounded-lg"
                  style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBO4LDA9uL4LM0HtcSdn_nKbrOXeuny0JLdtLO4PGKUzZ5eigwfUIlTFLnbY-ss5Pi2r437On_m2irukUitT62g6glbC1fTPHu1hQE6doMzbPKJfvsyjZtCS5xXk1TKEiBrmlc52RGkiuZ7H4fDoEE5Ffh33LY8ySzsf7whdIPjZqcy8vKbdTFlJYbk4HHXnt-hpKdhrkkqk24oKjPlChO7Pay2bqbTmko0rjGc4xeENkDSu4WL22XeASC-WGb1lhqYAE-pGXSSMUo");'
                ></div>
                <div>
                  <p class="text-[#181111] text-base font-medium leading-normal">Elegant Evening Dress</p>
                  <p class="text-[#886364] text-sm font-normal leading-normal">$120</p>
                </div>
              </div>
              <div class="flex flex-col gap-3 pb-3">
                <div
                  class="w-full bg-center bg-no-repeat aspect-[3/4] bg-cover rounded-lg"
                  style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBEbRvKKrQ9yfGeXK59pCFVuCzKlw00FrdpaQ5vU5Qo5gkmN-JIcn7SvipKMwBVcECZCk2gT6z0iC4eL0Qp295ecSIVTHhpMoLBBwptiipGVIQprzu3PfJNwGkbCgXXQwyGdrxtvyDs31HFYSeOrQk-96QPeiwu0UL5_oBsesit9iR_KAw6LDFUjDUKzliVVDqtLq57bxdMyjTgl0MeyYLlw-g52exD0Cc81O1NUcp8a49Rv7yiUmku79RF0j0E8mX4wTl7Ks1ww_U");'
                ></div>
                <div>
                  <p class="text-[#181111] text-base font-medium leading-normal">Casual Summer Top</p>
                  <p class="text-[#886364] text-sm font-normal leading-normal">$35</p>
                </div>
              </div>
              <div class="flex flex-col gap-3 pb-3">
                <div
                  class="w-full bg-center bg-no-repeat aspect-[3/4] bg-cover rounded-lg"
                  style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBFhfCk-WjZvDWN91bjfjDFejzK6ScTWG_SanwCXBXPmtIL9IlTDYnwT6m10WG4jv4jSLaWoLVvmUdXZzmPZJMixsCGARJ7IeCQveVYyy7qJ4vdKZP7pxK9qIOcX6I5IBUcxg2KzScD60Gj-M5U4mvqfFTAmUh5mxURkO12FPY2jxwtHbv9JwO4_Ovikj8O9NSw87VFl-4VY02co4prhTRBEY08nRVjv2oWXkKLL8Z3EZXd7pYDJPEn7-_tY47TSeO03O9vj56VM9s");'
                ></div>
                <div>
                  <p class="text-[#181111] text-base font-medium leading-normal">Classic Leather Handbag</p>
                  <p class="text-[#886364] text-sm font-normal leading-normal">$150</p>
                </div>
              </div>
              <div class="flex flex-col gap-3 pb-3">
                <div
                  class="w-full bg-center bg-no-repeat aspect-[3/4] bg-cover rounded-lg"
                  style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB-NUDbhzYaRjP5RggisQO23XOVFvdPcJEecKOn_fgTnG4igt5QHh1ejwKOjg480tQfDSHZ3boWbvyiIJa4KqJ9pjMq5DBx0G67wO7ukrRoI63f-4I0kU1gij3ES8WxqaUaXmxePUWXPa7rfCBMCQ3v3ZYwtP1ZV1ThYKV31nTOiD2jsH-UixzaqIbzD1-D72hf1IcEu8XSw_JMR8QcQHZpWtafidace_7FFYudrv23eXIAksP2udSK699KOx8NLjaCzgU12Z0ibRQ");'
                ></div>
                <div>
                  <p class="text-[#181111] text-base font-medium leading-normal">Stylish Ankle Boots</p>
                  <p class="text-[#886364] text-sm font-normal leading-normal">$90</p>
                </div>
              </div>
              <div class="flex flex-col gap-3 pb-3">
                <div
                  class="w-full bg-center bg-no-repeat aspect-[3/4] bg-cover rounded-lg"
                  style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCqwF_HRnGsJq_glengdgnReW47Fl852OxKotTPZPFsGwCIJsITyqRYpsPAYq1AB7YoAjocS4ngDb2pAUDfZx1TKhJgM7I-ZUBsMW67BYP8Joa33ugMaNeCt4B659VSA88ncCl16kFldxDCxkzgeWKkZaMepCCl6t8AoR41ia5Mkv0MdWhi_zVx8rj9shCcmRXBqY3QsAh9YtGtIfZwYN93ILU4ob3n2-hrVrCwjMSQJKy0oAqDUXZZg10G1sRLvylTw6xLVk7x8Wg");'
                ></div>
                <div>
                  <p class="text-[#181111] text-base font-medium leading-normal">Sporty Running Shoes</p>
                  <p class="text-[#886364] text-sm font-normal leading-normal">$75</p>
                </div>
              </div>
              <div class="flex flex-col gap-3 pb-3">
                <div
                  class="w-full bg-center bg-no-repeat aspect-[3/4] bg-cover rounded-lg"
                  style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDWl3GmKgGybjNZStAUV9faW6DTxTMfpbXXLJUVSwpgOBpwAz0ViiWaZbiVN1Ul96Dz82u81rD_85tvrnDr2AF1QjmhnkHCRHenpB7xcicdpXdufzXZTe1xE4SdutnXEgmr0hYbQYW6PoX1F32xEaxjfk-oMH69aUSVDUuYKj3vA7ylZnYs6TGuftzUMBIOqPmSehZzhqvL-GIpKIZSbpA0pXyBcGXUQ2ceGPugVtPArzj_QdvNXOG6QMNGBd2I-uR9izw_WTDwwmE");'
                ></div>
                <div>
                  <p class="text-[#181111] text-base font-medium leading-normal">Cozy Knit Sweater</p>
                  <p class="text-[#886364] text-sm font-normal leading-normal">$60</p>
                </div>
              </div>
            </div>
            <div class="flex items-center justify-center p-4">
              <a href="#" class="flex size-10 items-center justify-center">
                <div class="text-[#181111]" data-icon="CaretLeft" data-size="18px" data-weight="regular">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" fill="currentColor" viewBox="0 0 256 256">
                    <path d="M165.66,202.34a8,8,0,0,1-11.32,11.32l-80-80a8,8,0,0,1,0-11.32l80-80a8,8,0,0,1,11.32,11.32L91.31,128Z"></path>
                  </svg>
                </div>
              </a>
              <a class="text-sm font-bold leading-normal tracking-[0.015em] flex size-10 items-center justify-center text-[#181111] rounded-full bg-[#f4f0f0]" href="#">1</a>
              <a class="text-sm font-normal leading-normal flex size-10 items-center justify-center text-[#181111] rounded-full" href="#">2</a>
              <a class="text-sm font-normal leading-normal flex size-10 items-center justify-center text-[#181111] rounded-full" href="#">3</a>
              <a class="text-sm font-normal leading-normal flex size-10 items-center justify-center text-[#181111] rounded-full" href="#">4</a>
              <a class="text-sm font-normal leading-normal flex size-10 items-center justify-center text-[#181111] rounded-full" href="#">5</a>
              <a href="#" class="flex size-10 items-center justify-center">
                <div class="text-[#181111]" data-icon="CaretRight" data-size="18px" data-weight="regular">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" fill="currentColor" viewBox="0 0 256 256">
                    <path d="M181.66,133.66l-80,80a8,8,0,0,1-11.32-11.32L164.69,128,90.34,53.66a8,8,0,0,1,11.32-11.32l80,80A8,8,0,0,1,181.66,133.66Z"></path>
                  </svg>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
