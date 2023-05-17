<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #0B0E34;">
    <!-- Brand Logo -->
    <a href="{{route('index_page')}}" class="brand-link">
      <img src="{{asset('dist/img/gentlelogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="max-height:43px;">
      <span class="brand-text font-weight-light">Gentlemen</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/default.png')}}" class="img-circle elevation-2" alt="User Image" style="
              height: 97%;
              width: -14%;
          ">
        </div>
        <div class="info">
          {{-- <a href="{{route('dashboard')}}" class="d-block">{{Auth::guard('admin')->user()->name}}</a> --}}
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">DASHBBOARD</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Admin
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('create_admin_register')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin_register_list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="{{route('change_password')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li> -->
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Banner
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('create_banner')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('show_banner')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Package
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('add_package')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('package_list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Suit Tip
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('add_suit_tip')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('suit_tip_list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Testimonial
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('add_testimonial')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('testimonial_list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Categories
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('add_category')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('show_category_list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li> -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-layer-group"></i>
              <p>
                Categories
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Texture
                    <i class="right fas fa-angle-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('main_texture_list')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('add_main_texture')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Create</p>
                    </a>
                  </li>
                </ul>
              </li> --}}
              <!-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Style
                    <i class="right fas fa-angle-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('style_list')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('style')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Create</p>
                    </a>
                  </li>
                </ul>
              </li> -->
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Color
                    <i class="right fas fa-angle-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('color_list')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('color')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Create</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Size
                    <i class="right fas fa-angle-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('size_list')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('size')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Create</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-layer-group"></i>
              <p>
                Recommendation
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Style Category
                    <i class="right fas fa-angle-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('style_category_list')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('add_style_category')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Create</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Style
                    <i class="right fas fa-angle-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('style_list')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('style')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Create</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-layer-group"></i>
              <p>
                FAQ
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                  <p>
                    Faq Title
                    <i class="fas fa-angle-right right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('faq_title_list')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('add_faq_title')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Create</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                  <p>
                    Faq Question
                    <i class="fas fa-angle-right right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('faq_question_list')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('add_faq_question')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Create</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                  <p>
                    Answer
                    <i class="fas fa-angle-right right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('faq_list')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('add_faq')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Create</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                SubCategory
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('add_main_texture_sub')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('main_texture_sub_list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li> --}}
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Pattern
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('add_main_texture_sub')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('main_texture_sub_list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li> --}}
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Grand SubCategory
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('grand_texture')}} " class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('grand_texture_list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li> --}}
          {{-- Begin Fabrics --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-layer-group"></i>
              <p>
                Fabric
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Category
                    <i class="right fas fa-angle-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('main_texture_list')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('add_main_texture')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Create</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    SubCategory
                    <i class="right fas fa-angle-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('main_texture_sub_list')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('add_main_texture_sub')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Create</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Pattern
                    <i class="right fas fa-angle-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('show_fabric_pattern')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('create_fabric_pattern')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Create</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Grand SubCategory
                    <i class="right fas fa-angle-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('grand_texture_list')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('grand_texture')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Create</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          {{-- End Fabrics --}}
          {{-- Begin Addition --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-layer-group"></i>
              <p>
                Additional
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Category
                    <i class="right fas fa-angle-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('main_additional_list')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('add_main_additional')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Create</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    SubCategory
                    <i class="right fas fa-angle-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('main_additional_sub_list')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('add_main_additional_sub')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Create</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Grand SubCategory
                    <i class="right fas fa-angle-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('grand_additional_list')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('grand_additional')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Create</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          {{-- End Addition --}}
          <li class="nav-item">
            {{-- <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Fit Suits
                <i class="fas fa-angle-right right"></i>
              </p>
            </a> --}}
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('show_fit_suit_list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('add_fit_suit')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Ready To Wear
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('get_ready_to_wear')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('create_ready_to_wear')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Jacket Button
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('jacket_button_list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('add_jacket_button')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Vest Lapel
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('vest_lapel_list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('add_vest_lapel')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Pant Pleat
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('pant_pleat_list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('add_pant_pleat')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Measurement
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('personal_info_list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Personal Info List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('upper_measure_list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jacket/Vest List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('lower_measure_list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pant List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Customize Category
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('customize_category_list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('add_customize_category')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Shipping
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('shippings.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('shippings.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-align-right"></i>
              <p>
                Customize Suits
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Fabrics
                    <i class="right fas fa-angle-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('show_top_list')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('add_top')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Create</p>
                    </a>
                  </li>
                </ul>
              </li> -->

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Jackets
                    <i class="right fas fa-angle-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('show_top_list')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('add_top')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Create</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Vests
                    <i class="right fas fa-angle-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('show_shirt_button_list')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('add_shirt_button')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Create</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Pants
                    <i class="right fas fa-angle-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('show_pant_list')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('add_pant')}}" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Create</p>
                    </a>
                  </li>
                </ul>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('payment_list')}}" class="nav-link">
                <i class="far fa-dot-circle nav-icon"></i>
                <p>Payment Lists</p>
              </a>
          </li>
          <li class="nav-item">
                  <a class="nav-link" href="{{ route('backside.admin.logout') }}"
                      onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <i class="nav-icon fas fa-sign-out-alt"></i> <p>{{ __('Logout') }}</p>
                  </a>

                  <form id="logout-form" action="{{ route('backside.admin.logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <style>
    .sop-btm-right{
      position: fixed;
      bottom: 10px;
      text-align: left;

    }

    .sop-btm-right li{
        opacity: 0.6;
    }

    .sop-btm-right li:hover{
        opacity: 1;
    }

    .sop-btm-right{
            background-color: #0B0E34;
        }

  </style>
