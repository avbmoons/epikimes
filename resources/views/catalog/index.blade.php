@extends('layouts.main')

@section('title', 'Catalog')
@section('content')

        <div class="greeting-block" id="greetingBlock">
          <div class="title-link-block">
            <a href="pages/catalog.html" class="title-link">Arts catalog</a>
          </div>
          <div class="search-block">
            <input type="text" class="input-search" placeholder="write your searched text here ...">
            <button type="button" class="btn-search">
              <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M31.5 31.5L24.771 24.759M28.5 15.75C28.5 19.1315 27.1567 22.3745 24.7656 24.7656C22.3745 27.1567 19.1315 28.5 15.75 28.5C12.3685 28.5 9.12548 27.1567 6.73439 24.7656C4.3433 22.3745 3 19.1315 3 15.75C3 12.3685 4.3433 9.12548 6.73439 6.73439C9.12548 4.3433 12.3685 3 15.75 3C19.1315 3 22.3745 4.3433 24.7656 6.73439C27.1567 9.12548 28.5 12.3685 28.5 15.75Z" stroke="#453B3A" stroke-width="2" stroke-linecap="round"/>
              </svg>
            </button>
          </div>
          <div class="resource-link-block">
            <a href="#">
              <img src="../assets/icons/instagram-logo.png" alt="instagram" class="resource-link">
            </a>
          </div>
        </div>
        <div class="catalog-block">
          <a href="item.html" id="item1Link" class="item-link">
            <div class="catalog-item" id="item-1">
              <div class="item-img-block">
                <img src="../assets/catalog/item-1.png" alt="image" class="item-img">
              </div>
              <div class="item-txt-block">
                <div class="txt-left-block">
                  <p class="item-title">Ulfhedinn</p>
                  <div class="item-like-block">
                    <a href="#" class="item-like" title="Like this">
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_231_1497)">
                          <path d="M9.22828 2.19416C9.49494 1.49082 10.5041 1.49082 10.7716 2.19416L12.4966 6.97249C12.5568 7.12815 12.6628 7.26189 12.8005 7.35607C12.9383 7.45025 13.1014 7.50043 13.2683 7.49999H17.5074C18.2908 7.49999 18.6324 8.47499 18.0166 8.95249L14.9999 11.6667C14.865 11.7707 14.7664 11.9147 14.7182 12.0781C14.67 12.2416 14.6747 12.4161 14.7316 12.5767L15.8333 17.2458C16.1016 17.9958 15.2333 18.64 14.5766 18.1783L10.4791 15.5783C10.3388 15.4797 10.1715 15.4268 9.99994 15.4268C9.82843 15.4268 9.6611 15.4797 9.52078 15.5783L5.42328 18.1783C4.76744 18.64 3.89828 17.995 4.16661 17.2458L5.26828 12.5767C5.32516 12.4161 5.32985 12.2416 5.28166 12.0781C5.23347 11.9147 5.13487 11.7707 4.99994 11.6667L1.98328 8.95249C1.36661 8.47499 1.70994 7.49999 2.49161 7.49999H6.73078C6.89766 7.50043 7.06075 7.45025 7.19852 7.35607C7.33629 7.26189 7.44226 7.12815 7.50244 6.97249L9.22828 2.19416Z" stroke="#837E7B" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <defs>
                          <clipPath id="clip0_231_1497">
                            <rect width="20" height="20" fill="white"/>
                          </clipPath>
                        </defs>
                      </svg>                    
                    </a>
                    <p class="item-like-score">2</p>
                  </div>
                  <p class="item-series">The Epik series</p>
                </div>
                <div class="txt-right-block">
                  <p class="item-txt">colors 1</p>
                  <p class="item-txt">grey</p>
                  <p class="item-txt">size 18x13 cm</p>
                  <p class="item-txt">2026</p>
                </div>
              </div>
            </div>            
          </a>
          <a href="#" id="item2Link" class="item-link">
            <div class="catalog-item" id="item-2">
              <div class="item-img-block">
                <img src="../assets/catalog/item-2.png" alt="image" class="item-img">
              </div>
              <div class="item-txt-block">
                <div class="txt-left-block">
                  <p class="item-title">Odinn</p>
                  <div class="item-like-block">
                    <a href="#" class="item-like" title="Like this">
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_231_1497)">
                          <path d="M9.22828 2.19416C9.49494 1.49082 10.5041 1.49082 10.7716 2.19416L12.4966 6.97249C12.5568 7.12815 12.6628 7.26189 12.8005 7.35607C12.9383 7.45025 13.1014 7.50043 13.2683 7.49999H17.5074C18.2908 7.49999 18.6324 8.47499 18.0166 8.95249L14.9999 11.6667C14.865 11.7707 14.7664 11.9147 14.7182 12.0781C14.67 12.2416 14.6747 12.4161 14.7316 12.5767L15.8333 17.2458C16.1016 17.9958 15.2333 18.64 14.5766 18.1783L10.4791 15.5783C10.3388 15.4797 10.1715 15.4268 9.99994 15.4268C9.82843 15.4268 9.6611 15.4797 9.52078 15.5783L5.42328 18.1783C4.76744 18.64 3.89828 17.995 4.16661 17.2458L5.26828 12.5767C5.32516 12.4161 5.32985 12.2416 5.28166 12.0781C5.23347 11.9147 5.13487 11.7707 4.99994 11.6667L1.98328 8.95249C1.36661 8.47499 1.70994 7.49999 2.49161 7.49999H6.73078C6.89766 7.50043 7.06075 7.45025 7.19852 7.35607C7.33629 7.26189 7.44226 7.12815 7.50244 6.97249L9.22828 2.19416Z" stroke="#837E7B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <defs>
                          <clipPath id="clip0_231_1497">
                            <rect width="20" height="20" fill="white"/>
                          </clipPath>
                        </defs>
                      </svg>                    
                    </a>
                    <p class="item-like-score">1</p>
                  </div>
                  <p class="item-series">The Epik series</p>
                </div>
                <div class="txt-right-block">
                  <p class="item-txt">colors 1</p>
                  <p class="item-txt">grey</p>
                  <p class="item-txt">size 15x21 cm</p>
                  <p class="item-txt">2026</p>
                </div>
              </div>
            </div>            
          </a>
          <div class="catalog-item" id="item-3">
            <div class="item-img-block">
              <img src="../assets/catalog/item-3.png" alt="image" class="item-img">
            </div>
            <div class="item-txt-block">
              <div class="txt-left-block">
                <p class="item-title">Fenrir</p>
                <div class="item-like-block">
                  <a href="#" class="item-like" title="Like this">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_231_1497)">
                        <path d="M9.22828 2.19416C9.49494 1.49082 10.5041 1.49082 10.7716 2.19416L12.4966 6.97249C12.5568 7.12815 12.6628 7.26189 12.8005 7.35607C12.9383 7.45025 13.1014 7.50043 13.2683 7.49999H17.5074C18.2908 7.49999 18.6324 8.47499 18.0166 8.95249L14.9999 11.6667C14.865 11.7707 14.7664 11.9147 14.7182 12.0781C14.67 12.2416 14.6747 12.4161 14.7316 12.5767L15.8333 17.2458C16.1016 17.9958 15.2333 18.64 14.5766 18.1783L10.4791 15.5783C10.3388 15.4797 10.1715 15.4268 9.99994 15.4268C9.82843 15.4268 9.6611 15.4797 9.52078 15.5783L5.42328 18.1783C4.76744 18.64 3.89828 17.995 4.16661 17.2458L5.26828 12.5767C5.32516 12.4161 5.32985 12.2416 5.28166 12.0781C5.23347 11.9147 5.13487 11.7707 4.99994 11.6667L1.98328 8.95249C1.36661 8.47499 1.70994 7.49999 2.49161 7.49999H6.73078C6.89766 7.50043 7.06075 7.45025 7.19852 7.35607C7.33629 7.26189 7.44226 7.12815 7.50244 6.97249L9.22828 2.19416Z" stroke="#837E7B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </g>
                      <defs>
                        <clipPath id="clip0_231_1497">
                          <rect width="20" height="20" fill="white"/>
                        </clipPath>
                      </defs>
                    </svg>                    
                  </a>
                  <p class="item-like-score"></p>
                </div>
                <p class="item-series">The Epik series</p>
              </div>
              <div class="txt-right-block">
                <p class="item-txt">colors 1</p>
                <p class="item-txt">grey dark</p>
                <p class="item-txt">size 19x14 cm</p>
                <p class="item-txt">2026</p>
              </div>
            </div>
          </div>
          <div class="catalog-item" id="item-4">
            <div class="item-img-block">
              <img src="../assets/catalog/item-4.png" alt="image" class="item-img">
            </div>
            <div class="item-txt-block">
              <div class="txt-left-block">
                <p class="item-title">Odinn</p>
                <div class="item-like-block">
                  <a href="#" class="item-like" title="Like this">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_231_1497)">
                        <path d="M9.22828 2.19416C9.49494 1.49082 10.5041 1.49082 10.7716 2.19416L12.4966 6.97249C12.5568 7.12815 12.6628 7.26189 12.8005 7.35607C12.9383 7.45025 13.1014 7.50043 13.2683 7.49999H17.5074C18.2908 7.49999 18.6324 8.47499 18.0166 8.95249L14.9999 11.6667C14.865 11.7707 14.7664 11.9147 14.7182 12.0781C14.67 12.2416 14.6747 12.4161 14.7316 12.5767L15.8333 17.2458C16.1016 17.9958 15.2333 18.64 14.5766 18.1783L10.4791 15.5783C10.3388 15.4797 10.1715 15.4268 9.99994 15.4268C9.82843 15.4268 9.6611 15.4797 9.52078 15.5783L5.42328 18.1783C4.76744 18.64 3.89828 17.995 4.16661 17.2458L5.26828 12.5767C5.32516 12.4161 5.32985 12.2416 5.28166 12.0781C5.23347 11.9147 5.13487 11.7707 4.99994 11.6667L1.98328 8.95249C1.36661 8.47499 1.70994 7.49999 2.49161 7.49999H6.73078C6.89766 7.50043 7.06075 7.45025 7.19852 7.35607C7.33629 7.26189 7.44226 7.12815 7.50244 6.97249L9.22828 2.19416Z" stroke="#837E7B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </g>
                      <defs>
                        <clipPath id="clip0_231_1497">
                          <rect width="20" height="20" fill="white"/>
                        </clipPath>
                      </defs>
                    </svg>                    
                  </a>
                  <p class="item-like-score">14</p>
                </div>
                <p class="item-series">The Epik series</p>
              </div>
              <div class="txt-right-block">
                <p class="item-txt">colors 1</p>
                <p class="item-txt">blue</p>
                <p class="item-txt">size 15x21 cm</p>
                <p class="item-txt">2026</p>
              </div>
            </div>
          </div>
          <div class="catalog-item" id="item-5">
            <div class="item-img-block">
              <img src="../assets/catalog/item-5.png" alt="image" class="item-img">
            </div>
            <div class="item-txt-block">
              <div class="txt-left-block">
                <p class="item-title">Odinn</p>
                <div class="item-like-block">
                  <a href="#" class="item-like" title="Like this">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_231_1497)">
                        <path d="M9.22828 2.19416C9.49494 1.49082 10.5041 1.49082 10.7716 2.19416L12.4966 6.97249C12.5568 7.12815 12.6628 7.26189 12.8005 7.35607C12.9383 7.45025 13.1014 7.50043 13.2683 7.49999H17.5074C18.2908 7.49999 18.6324 8.47499 18.0166 8.95249L14.9999 11.6667C14.865 11.7707 14.7664 11.9147 14.7182 12.0781C14.67 12.2416 14.6747 12.4161 14.7316 12.5767L15.8333 17.2458C16.1016 17.9958 15.2333 18.64 14.5766 18.1783L10.4791 15.5783C10.3388 15.4797 10.1715 15.4268 9.99994 15.4268C9.82843 15.4268 9.6611 15.4797 9.52078 15.5783L5.42328 18.1783C4.76744 18.64 3.89828 17.995 4.16661 17.2458L5.26828 12.5767C5.32516 12.4161 5.32985 12.2416 5.28166 12.0781C5.23347 11.9147 5.13487 11.7707 4.99994 11.6667L1.98328 8.95249C1.36661 8.47499 1.70994 7.49999 2.49161 7.49999H6.73078C6.89766 7.50043 7.06075 7.45025 7.19852 7.35607C7.33629 7.26189 7.44226 7.12815 7.50244 6.97249L9.22828 2.19416Z" stroke="#837E7B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </g>
                      <defs>
                        <clipPath id="clip0_231_1497">
                          <rect width="20" height="20" fill="white"/>
                        </clipPath>
                      </defs>
                    </svg>                    
                  </a>
                  <p class="item-like-score">3</p>
                </div>
                <p class="item-series">The Epik series</p>
              </div>
              <div class="txt-right-block">
                <p class="item-txt">colors 1</p>
                <p class="item-txt">red brown</p>
                <p class="item-txt">size 15x21 cm</p>
                <p class="item-txt">2026</p>
              </div>
            </div>
          </div>
          <div class="catalog-item" id="item-6">
            <div class="item-img-block">
              <img src="../assets/catalog/item-6.png" alt="image" class="item-img">
            </div>
            <div class="item-txt-block">
              <div class="txt-left-block">
                <p class="item-title">Drengir</p>
                <div class="item-like-block">
                  <a href="#" class="item-like" title="Like this">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_231_1497)">
                        <path d="M9.22828 2.19416C9.49494 1.49082 10.5041 1.49082 10.7716 2.19416L12.4966 6.97249C12.5568 7.12815 12.6628 7.26189 12.8005 7.35607C12.9383 7.45025 13.1014 7.50043 13.2683 7.49999H17.5074C18.2908 7.49999 18.6324 8.47499 18.0166 8.95249L14.9999 11.6667C14.865 11.7707 14.7664 11.9147 14.7182 12.0781C14.67 12.2416 14.6747 12.4161 14.7316 12.5767L15.8333 17.2458C16.1016 17.9958 15.2333 18.64 14.5766 18.1783L10.4791 15.5783C10.3388 15.4797 10.1715 15.4268 9.99994 15.4268C9.82843 15.4268 9.6611 15.4797 9.52078 15.5783L5.42328 18.1783C4.76744 18.64 3.89828 17.995 4.16661 17.2458L5.26828 12.5767C5.32516 12.4161 5.32985 12.2416 5.28166 12.0781C5.23347 11.9147 5.13487 11.7707 4.99994 11.6667L1.98328 8.95249C1.36661 8.47499 1.70994 7.49999 2.49161 7.49999H6.73078C6.89766 7.50043 7.06075 7.45025 7.19852 7.35607C7.33629 7.26189 7.44226 7.12815 7.50244 6.97249L9.22828 2.19416Z" stroke="#837E7B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </g>
                      <defs>
                        <clipPath id="clip0_231_1497">
                          <rect width="20" height="20" fill="white"/>
                        </clipPath>
                      </defs>
                    </svg>                    
                  </a>
                  <p class="item-like-score">5</p>
                </div>
                <p class="item-series">The Epik series</p>
              </div>
              <div class="txt-right-block">
                <p class="item-txt">colors 1</p>
                <p class="item-txt">grey</p>
                <p class="item-txt">size 15x21 cm</p>
                <p class="item-txt">2026</p>
              </div>
            </div>
          </div>
          <div class="catalog-item" id="item-7">
            <div class="item-img-block">
              <img src="../assets/catalog/item-7.png" alt="image" class="item-img">
            </div>
            <div class="item-txt-block">
              <div class="txt-left-block">
                <p class="item-title">Dragon</p>
                <div class="item-like-block">
                  <a href="#" class="item-like" title="Like this">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_231_1497)">
                        <path d="M9.22828 2.19416C9.49494 1.49082 10.5041 1.49082 10.7716 2.19416L12.4966 6.97249C12.5568 7.12815 12.6628 7.26189 12.8005 7.35607C12.9383 7.45025 13.1014 7.50043 13.2683 7.49999H17.5074C18.2908 7.49999 18.6324 8.47499 18.0166 8.95249L14.9999 11.6667C14.865 11.7707 14.7664 11.9147 14.7182 12.0781C14.67 12.2416 14.6747 12.4161 14.7316 12.5767L15.8333 17.2458C16.1016 17.9958 15.2333 18.64 14.5766 18.1783L10.4791 15.5783C10.3388 15.4797 10.1715 15.4268 9.99994 15.4268C9.82843 15.4268 9.6611 15.4797 9.52078 15.5783L5.42328 18.1783C4.76744 18.64 3.89828 17.995 4.16661 17.2458L5.26828 12.5767C5.32516 12.4161 5.32985 12.2416 5.28166 12.0781C5.23347 11.9147 5.13487 11.7707 4.99994 11.6667L1.98328 8.95249C1.36661 8.47499 1.70994 7.49999 2.49161 7.49999H6.73078C6.89766 7.50043 7.06075 7.45025 7.19852 7.35607C7.33629 7.26189 7.44226 7.12815 7.50244 6.97249L9.22828 2.19416Z" stroke="#837E7B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </g>
                      <defs>
                        <clipPath id="clip0_231_1497">
                          <rect width="20" height="20" fill="white"/>
                        </clipPath>
                      </defs>
                    </svg>                    
                  </a>
                  <p class="item-like-score">38</p>
                </div>
                <p class="item-series">The Epik series</p>
              </div>
              <div class="txt-right-block">
                <p class="item-txt">colors 1</p>
                <p class="item-txt">green</p>
                <p class="item-txt">size 29x21 cm</p>
                <p class="item-txt">2026</p>
              </div>
            </div>
          </div>
          <div class="catalog-item" id="item-8">
            <div class="item-img-block">
              <img src="../assets/catalog/item-8.png" alt="image" class="item-img">
            </div>
            <div class="item-txt-block">
              <div class="txt-left-block">
                <p class="item-title">Drengir</p>
                <div class="item-like-block">
                  <a href="#" class="item-like" title="Like this">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_231_1497)">
                        <path d="M9.22828 2.19416C9.49494 1.49082 10.5041 1.49082 10.7716 2.19416L12.4966 6.97249C12.5568 7.12815 12.6628 7.26189 12.8005 7.35607C12.9383 7.45025 13.1014 7.50043 13.2683 7.49999H17.5074C18.2908 7.49999 18.6324 8.47499 18.0166 8.95249L14.9999 11.6667C14.865 11.7707 14.7664 11.9147 14.7182 12.0781C14.67 12.2416 14.6747 12.4161 14.7316 12.5767L15.8333 17.2458C16.1016 17.9958 15.2333 18.64 14.5766 18.1783L10.4791 15.5783C10.3388 15.4797 10.1715 15.4268 9.99994 15.4268C9.82843 15.4268 9.6611 15.4797 9.52078 15.5783L5.42328 18.1783C4.76744 18.64 3.89828 17.995 4.16661 17.2458L5.26828 12.5767C5.32516 12.4161 5.32985 12.2416 5.28166 12.0781C5.23347 11.9147 5.13487 11.7707 4.99994 11.6667L1.98328 8.95249C1.36661 8.47499 1.70994 7.49999 2.49161 7.49999H6.73078C6.89766 7.50043 7.06075 7.45025 7.19852 7.35607C7.33629 7.26189 7.44226 7.12815 7.50244 6.97249L9.22828 2.19416Z" stroke="#837E7B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </g>
                      <defs>
                        <clipPath id="clip0_231_1497">
                          <rect width="20" height="20" fill="white"/>
                        </clipPath>
                      </defs>
                    </svg>                    
                  </a>
                  <p class="item-like-score">6</p>
                </div>
                <p class="item-series">The Epik series</p>
              </div>
              <div class="txt-right-block">
                <p class="item-txt">colors 1</p>
                <p class="item-txt">grey</p>
                <p class="item-txt">size 21x14 cm</p>
                <p class="item-txt">2024</p>
              </div>
            </div>
          </div>
          <div class="catalog-item" id="item-9">
            <div class="item-img-block">
              <img src="../assets/catalog/item-9.png" alt="image" class="item-img">
            </div>
            <div class="item-txt-block">
              <div class="txt-left-block">
                <p class="item-title">Fenrir</p>
                <div class="item-like-block">
                  <a href="#" class="item-like" title="Like this">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_231_1497)">
                        <path d="M9.22828 2.19416C9.49494 1.49082 10.5041 1.49082 10.7716 2.19416L12.4966 6.97249C12.5568 7.12815 12.6628 7.26189 12.8005 7.35607C12.9383 7.45025 13.1014 7.50043 13.2683 7.49999H17.5074C18.2908 7.49999 18.6324 8.47499 18.0166 8.95249L14.9999 11.6667C14.865 11.7707 14.7664 11.9147 14.7182 12.0781C14.67 12.2416 14.6747 12.4161 14.7316 12.5767L15.8333 17.2458C16.1016 17.9958 15.2333 18.64 14.5766 18.1783L10.4791 15.5783C10.3388 15.4797 10.1715 15.4268 9.99994 15.4268C9.82843 15.4268 9.6611 15.4797 9.52078 15.5783L5.42328 18.1783C4.76744 18.64 3.89828 17.995 4.16661 17.2458L5.26828 12.5767C5.32516 12.4161 5.32985 12.2416 5.28166 12.0781C5.23347 11.9147 5.13487 11.7707 4.99994 11.6667L1.98328 8.95249C1.36661 8.47499 1.70994 7.49999 2.49161 7.49999H6.73078C6.89766 7.50043 7.06075 7.45025 7.19852 7.35607C7.33629 7.26189 7.44226 7.12815 7.50244 6.97249L9.22828 2.19416Z" stroke="#837E7B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </g>
                      <defs>
                        <clipPath id="clip0_231_1497">
                          <rect width="20" height="20" fill="white"/>
                        </clipPath>
                      </defs>
                    </svg>                    
                  </a>
                  <p class="item-like-score">4</p>
                </div>
                <p class="item-series">The Epik series</p>
              </div>
              <div class="txt-right-block">
                <p class="item-txt">colors 1</p>
                <p class="item-txt">grey dark</p>
                <p class="item-txt">size 29214 cm</p>
                <p class="item-txt">2024</p>
              </div>
            </div>
          </div>
          <div class="catalog-item" id="item-10">
            <div class="item-img-block">
              <img src="../assets/catalog/item-10.png" alt="image" class="item-img">
            </div>
            <div class="item-txt-block">
              <div class="txt-left-block">
                <p class="item-title">Ulfhedinn</p>
                <div class="item-like-block">
                  <a href="#" class="item-like" title="Like this">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_231_1497)">
                        <path d="M9.22828 2.19416C9.49494 1.49082 10.5041 1.49082 10.7716 2.19416L12.4966 6.97249C12.5568 7.12815 12.6628 7.26189 12.8005 7.35607C12.9383 7.45025 13.1014 7.50043 13.2683 7.49999H17.5074C18.2908 7.49999 18.6324 8.47499 18.0166 8.95249L14.9999 11.6667C14.865 11.7707 14.7664 11.9147 14.7182 12.0781C14.67 12.2416 14.6747 12.4161 14.7316 12.5767L15.8333 17.2458C16.1016 17.9958 15.2333 18.64 14.5766 18.1783L10.4791 15.5783C10.3388 15.4797 10.1715 15.4268 9.99994 15.4268C9.82843 15.4268 9.6611 15.4797 9.52078 15.5783L5.42328 18.1783C4.76744 18.64 3.89828 17.995 4.16661 17.2458L5.26828 12.5767C5.32516 12.4161 5.32985 12.2416 5.28166 12.0781C5.23347 11.9147 5.13487 11.7707 4.99994 11.6667L1.98328 8.95249C1.36661 8.47499 1.70994 7.49999 2.49161 7.49999H6.73078C6.89766 7.50043 7.06075 7.45025 7.19852 7.35607C7.33629 7.26189 7.44226 7.12815 7.50244 6.97249L9.22828 2.19416Z" stroke="#837E7B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </g>
                      <defs>
                        <clipPath id="clip0_231_1497">
                          <rect width="20" height="20" fill="white"/>
                        </clipPath>
                      </defs>
                    </svg>                    
                  </a>
                  <p class="item-like-score">2</p>
                </div>
                <p class="item-series">The Epik series</p>
              </div>
              <div class="txt-right-block">
                <p class="item-txt">colors 1</p>
                <p class="item-txt">brown</p>
                <p class="item-txt">size 21x14 cm</p>
                <p class="item-txt">2026</p>
              </div>
            </div>
          </div>
          <div class="catalog-item" id="item-11">
            <div class="item-img-block">
              <img src="../assets/catalog/item-11.png" alt="image" class="item-img">
            </div>
            <div class="item-txt-block">
              <div class="txt-left-block">
                <p class="item-title">Huginn&nbsp;&&nbsp;Muninn</p>
                <div class="item-like-block">
                  <a href="#" class="item-like" title="Like this">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_231_1497)">
                        <path d="M9.22828 2.19416C9.49494 1.49082 10.5041 1.49082 10.7716 2.19416L12.4966 6.97249C12.5568 7.12815 12.6628 7.26189 12.8005 7.35607C12.9383 7.45025 13.1014 7.50043 13.2683 7.49999H17.5074C18.2908 7.49999 18.6324 8.47499 18.0166 8.95249L14.9999 11.6667C14.865 11.7707 14.7664 11.9147 14.7182 12.0781C14.67 12.2416 14.6747 12.4161 14.7316 12.5767L15.8333 17.2458C16.1016 17.9958 15.2333 18.64 14.5766 18.1783L10.4791 15.5783C10.3388 15.4797 10.1715 15.4268 9.99994 15.4268C9.82843 15.4268 9.6611 15.4797 9.52078 15.5783L5.42328 18.1783C4.76744 18.64 3.89828 17.995 4.16661 17.2458L5.26828 12.5767C5.32516 12.4161 5.32985 12.2416 5.28166 12.0781C5.23347 11.9147 5.13487 11.7707 4.99994 11.6667L1.98328 8.95249C1.36661 8.47499 1.70994 7.49999 2.49161 7.49999H6.73078C6.89766 7.50043 7.06075 7.45025 7.19852 7.35607C7.33629 7.26189 7.44226 7.12815 7.50244 6.97249L9.22828 2.19416Z" stroke="#837E7B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </g>
                      <defs>
                        <clipPath id="clip0_231_1497">
                          <rect width="20" height="20" fill="white"/>
                        </clipPath>
                      </defs>
                    </svg>                    
                  </a>
                  <p class="item-like-score">22</p>
                </div>
                <p class="item-series">The Epik series</p>
              </div>
              <div class="txt-right-block">
                <p class="item-txt">colors 1</p>
                <p class="item-txt">blue</p>
                <p class="item-txt">size 21x15 cm</p>
                <p class="item-txt">2024</p>
              </div>
            </div>
          </div>
          <div class="catalog-item" id="item-12">
            <div class="item-img-block">
              <img src="../assets/catalog/item-12.png" alt="image" class="item-img">
            </div>
            <div class="item-txt-block">
              <div class="txt-left-block">
                <p class="item-title">Odinn</p>
                <div class="item-like-block">
                  <a href="#" class="item-like" title="Like this">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_231_1497)">
                        <path d="M9.22828 2.19416C9.49494 1.49082 10.5041 1.49082 10.7716 2.19416L12.4966 6.97249C12.5568 7.12815 12.6628 7.26189 12.8005 7.35607C12.9383 7.45025 13.1014 7.50043 13.2683 7.49999H17.5074C18.2908 7.49999 18.6324 8.47499 18.0166 8.95249L14.9999 11.6667C14.865 11.7707 14.7664 11.9147 14.7182 12.0781C14.67 12.2416 14.6747 12.4161 14.7316 12.5767L15.8333 17.2458C16.1016 17.9958 15.2333 18.64 14.5766 18.1783L10.4791 15.5783C10.3388 15.4797 10.1715 15.4268 9.99994 15.4268C9.82843 15.4268 9.6611 15.4797 9.52078 15.5783L5.42328 18.1783C4.76744 18.64 3.89828 17.995 4.16661 17.2458L5.26828 12.5767C5.32516 12.4161 5.32985 12.2416 5.28166 12.0781C5.23347 11.9147 5.13487 11.7707 4.99994 11.6667L1.98328 8.95249C1.36661 8.47499 1.70994 7.49999 2.49161 7.49999H6.73078C6.89766 7.50043 7.06075 7.45025 7.19852 7.35607C7.33629 7.26189 7.44226 7.12815 7.50244 6.97249L9.22828 2.19416Z" stroke="#837E7B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </g>
                      <defs>
                        <clipPath id="clip0_231_1497">
                          <rect width="20" height="20" fill="white"/>
                        </clipPath>
                      </defs>
                    </svg>                    
                  </a>
                  <p class="item-like-score">8</p>
                </div>
                <p class="item-series">The Epik series</p>
              </div>
              <div class="txt-right-block">
                <p class="item-txt">colors 1</p>
                <p class="item-txt">grey</p>
                <p class="item-txt">size 21x29 cm</p>
                <p class="item-txt">2026</p>
              </div>
            </div>
          </div>
          <div class="catalog-item" id="item-13">
            <div class="item-img-block">
              <img src="../assets/catalog/item-13.png" alt="image" class="item-img">
            </div>
            <div class="item-txt-block">
              <div class="txt-left-block">
                <p class="item-title">Birds</p>
                <div class="item-like-block">
                  <a href="#" class="item-like" title="Like this">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_231_1497)">
                        <path d="M9.22828 2.19416C9.49494 1.49082 10.5041 1.49082 10.7716 2.19416L12.4966 6.97249C12.5568 7.12815 12.6628 7.26189 12.8005 7.35607C12.9383 7.45025 13.1014 7.50043 13.2683 7.49999H17.5074C18.2908 7.49999 18.6324 8.47499 18.0166 8.95249L14.9999 11.6667C14.865 11.7707 14.7664 11.9147 14.7182 12.0781C14.67 12.2416 14.6747 12.4161 14.7316 12.5767L15.8333 17.2458C16.1016 17.9958 15.2333 18.64 14.5766 18.1783L10.4791 15.5783C10.3388 15.4797 10.1715 15.4268 9.99994 15.4268C9.82843 15.4268 9.6611 15.4797 9.52078 15.5783L5.42328 18.1783C4.76744 18.64 3.89828 17.995 4.16661 17.2458L5.26828 12.5767C5.32516 12.4161 5.32985 12.2416 5.28166 12.0781C5.23347 11.9147 5.13487 11.7707 4.99994 11.6667L1.98328 8.95249C1.36661 8.47499 1.70994 7.49999 2.49161 7.49999H6.73078C6.89766 7.50043 7.06075 7.45025 7.19852 7.35607C7.33629 7.26189 7.44226 7.12815 7.50244 6.97249L9.22828 2.19416Z" stroke="#837E7B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </g>
                      <defs>
                        <clipPath id="clip0_231_1497">
                          <rect width="20" height="20" fill="white"/>
                        </clipPath>
                      </defs>
                    </svg>                    
                  </a>
                  <p class="item-like-score">10</p>
                </div>
                <p class="item-series">The Epik series</p>
              </div>
              <div class="txt-right-block">
                <p class="item-txt">colors 1</p>
                <p class="item-txt">grey dark</p>
                <p class="item-txt">size 15x21 cm</p>
                <p class="item-txt">2026</p>
              </div>
            </div>
          </div>
          <div class="catalog-item" id="item-14">
            <div class="item-img-block">
              <img src="../assets/catalog/item-14.png" alt="image" class="item-img">
            </div>
            <div class="item-txt-block">
              <div class="txt-left-block">
                <p class="item-title">Elf</p>
                <div class="item-like-block">
                  <a href="#" class="item-like" title="Like this">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_231_1497)">
                        <path d="M9.22828 2.19416C9.49494 1.49082 10.5041 1.49082 10.7716 2.19416L12.4966 6.97249C12.5568 7.12815 12.6628 7.26189 12.8005 7.35607C12.9383 7.45025 13.1014 7.50043 13.2683 7.49999H17.5074C18.2908 7.49999 18.6324 8.47499 18.0166 8.95249L14.9999 11.6667C14.865 11.7707 14.7664 11.9147 14.7182 12.0781C14.67 12.2416 14.6747 12.4161 14.7316 12.5767L15.8333 17.2458C16.1016 17.9958 15.2333 18.64 14.5766 18.1783L10.4791 15.5783C10.3388 15.4797 10.1715 15.4268 9.99994 15.4268C9.82843 15.4268 9.6611 15.4797 9.52078 15.5783L5.42328 18.1783C4.76744 18.64 3.89828 17.995 4.16661 17.2458L5.26828 12.5767C5.32516 12.4161 5.32985 12.2416 5.28166 12.0781C5.23347 11.9147 5.13487 11.7707 4.99994 11.6667L1.98328 8.95249C1.36661 8.47499 1.70994 7.49999 2.49161 7.49999H6.73078C6.89766 7.50043 7.06075 7.45025 7.19852 7.35607C7.33629 7.26189 7.44226 7.12815 7.50244 6.97249L9.22828 2.19416Z" stroke="#837E7B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </g>
                      <defs>
                        <clipPath id="clip0_231_1497">
                          <rect width="20" height="20" fill="white"/>
                        </clipPath>
                      </defs>
                    </svg>                    
                  </a>
                  <p class="item-like-score">7</p>
                </div>
                <p class="item-series">The Epik series</p>
              </div>
              <div class="txt-right-block">
                <p class="item-txt">colors 1</p>
                <p class="item-txt">grey dark</p>
                <p class="item-txt">size 15x21 cm</p>
                <p class="item-txt">2025</p>
              </div>
            </div>
          </div>
        </div>

@endsection

@push('js')
<script></script>
@endpush