<div class="dashboard_right_header_title">
  <p>
    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M6.59984 16.9999L6.39934 14.1928C6.29154 12.6836 7.4868 11.3999 8.99984 11.3999C10.5129 11.3999 11.7082 12.6836 11.6003 14.1928L11.3998 16.9999" stroke="#0B0D1E" stroke-width="1.5"/>
    <path d="M1.28111 9.9708C0.998696 8.13296 0.857488 7.2141 1.20494 6.3995C1.55238 5.5849 2.32322 5.02754 3.86491 3.91285L5.01679 3.08C6.93463 1.69334 7.89354 1 9.00002 1C10.1064 1 11.0654 1.69334 12.9832 3.08L14.1351 3.91285C15.6768 5.02754 16.4476 5.5849 16.7951 6.3995C17.1425 7.2141 17.0013 8.13296 16.7189 9.9708L16.4781 11.5379C16.0777 14.1431 15.8775 15.4458 14.9432 16.2229C14.0089 17 12.6429 17 9.91106 17H8.08898C5.35707 17 3.99113 17 3.0568 16.2229C2.12247 15.4458 1.9223 14.1431 1.52194 11.5379L1.28111 9.9708Z" stroke="#0B0D1E" stroke-width="1.5" stroke-linejoin="round"/>
  </svg>
    Dashboard
  </p>
</div>
<div class="dashboard_right_header_profile">
  <a href="#">
    @if(Auth::user()->photo==null )
      <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/dashboard/profile.png" alt=""></span>
    @else
    <span><img src="{{asset('/'.Auth::user()->photo)}}" alt=""></span>
    @endif
    
    {{ Auth::user()->name }}
  </a>
  <a href="#" class="dashboard_mobile_menu_bar"><img src="{{ asset('frontend/updatedesign') }}/assets/images/dashboard/menu-bar.png" alt=""></a>
</div>