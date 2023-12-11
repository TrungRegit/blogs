@php
    $status = app('request')->input('status');
@endphp

@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">

            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link arrow" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path
                                d="M6.66666 9.9999C6.66628 9.80519 6.73409 9.6165 6.85833 9.46657L11.025 4.46657C11.1664 4.29639 11.3697 4.18937 11.5901 4.16905C11.8104 4.14874 12.0298 4.21679 12.2 4.35824C12.3702 4.49969 12.4772 4.70295 12.4975 4.9233C12.5178 5.14366 12.4498 5.36306 12.3083 5.53324L8.57499 9.9999L12.175 14.4666C12.2442 14.5518 12.2959 14.6499 12.3271 14.7552C12.3583 14.8605 12.3684 14.9709 12.3568 15.0801C12.3451 15.1892 12.3121 15.2951 12.2594 15.3914C12.2068 15.4878 12.1356 15.5728 12.05 15.6416C11.9643 15.7179 11.8638 15.7757 11.7547 15.8113C11.6457 15.847 11.5304 15.8598 11.4162 15.8488C11.302 15.8379 11.1912 15.8034 11.091 15.7477C10.9907 15.692 10.9029 15.6161 10.8333 15.5249L6.80833 10.5249C6.70373 10.3707 6.65385 10.1858 6.66666 9.9999Z"
                                fill="white" />
                        </svg>
                    </span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link arrow"
                        href="{{ url()->current() }} ? {{ http_build_query(['page' => $paginator->currentPage() - 1, 'status' => $status]) }}"
                        rel="prev" aria-label="@lang('pagination.previous')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path
                                d="M6.66666 9.9999C6.66628 9.80519 6.73409 9.6165 6.85833 9.46657L11.025 4.46657C11.1664 4.29639 11.3697 4.18937 11.5901 4.16905C11.8104 4.14874 12.0298 4.21679 12.2 4.35824C12.3702 4.49969 12.4772 4.70295 12.4975 4.9233C12.5178 5.14366 12.4498 5.36306 12.3083 5.53324L8.57499 9.9999L12.175 14.4666C12.2442 14.5518 12.2959 14.6499 12.3271 14.7552C12.3583 14.8605 12.3684 14.9709 12.3568 15.0801C12.3451 15.1892 12.3121 15.2951 12.2594 15.3914C12.2068 15.4878 12.1356 15.5728 12.05 15.6416C11.9643 15.7179 11.8638 15.7757 11.7547 15.8113C11.6457 15.847 11.5304 15.8598 11.4162 15.8488C11.302 15.8379 11.1912 15.8034 11.091 15.7477C10.9907 15.692 10.9029 15.6161 10.8333 15.5249L6.80833 10.5249C6.70373 10.3707 6.65385 10.1858 6.66666 9.9999Z"
                                fill="white"></path>
                        </svg>
                    </a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">{{ $element }}</span>
                    </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item" aria-current="page">
                                <span class="page-link page-current">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link"
                                    href="{{ url()->current() }} ? {{ http_build_query(['page' => $page, 'status' => $status]) }}">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link arrow"
                        href="{{ url()->current() }} ? {{ http_build_query(['page' => $paginator->currentPage() + 1, 'status' => $status]) }}"
                        rel="next" aria-label="@lang('pagination.next')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path
                                d="M13.3333 10.0001C13.3337 10.1948 13.2659 10.3835 13.1417 10.5334L8.975 15.5334C8.83355 15.7036 8.63029 15.8106 8.40994 15.8309C8.18958 15.8513 7.97018 15.7832 7.8 15.6418C7.62982 15.5003 7.5228 15.2971 7.50248 15.0767C7.48217 14.8563 7.55022 14.6369 7.69167 14.4668L11.425 10.0001L7.825 5.53343C7.75578 5.44819 7.70409 5.35011 7.67289 5.24483C7.6417 5.13954 7.63162 5.02913 7.64324 4.91994C7.65485 4.81075 7.68794 4.70493 7.74058 4.60857C7.79323 4.51221 7.8644 4.4272 7.95 4.35843C8.03569 4.28211 8.13621 4.22431 8.24527 4.18865C8.35433 4.15299 8.46958 4.14024 8.5838 4.15119C8.69802 4.16214 8.80875 4.19657 8.90904 4.2523C9.00934 4.30804 9.09705 4.38389 9.16667 4.4751L13.1917 9.4751C13.2963 9.62933 13.3461 9.81418 13.3333 10.0001Z"
                                fill="white" />
                        </svg>
                    </a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link arrow" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                            fill="none">
                            <path
                                d="M13.3333 10.0001C13.3337 10.1948 13.2659 10.3835 13.1417 10.5334L8.975 15.5334C8.83355 15.7036 8.63029 15.8106 8.40994 15.8309C8.18958 15.8513 7.97018 15.7832 7.8 15.6418C7.62982 15.5003 7.5228 15.2971 7.50248 15.0767C7.48217 14.8563 7.55022 14.6369 7.69167 14.4668L11.425 10.0001L7.825 5.53343C7.75578 5.44819 7.70409 5.35011 7.67289 5.24483C7.6417 5.13954 7.63162 5.02913 7.64324 4.91994C7.65485 4.81075 7.68794 4.70493 7.74058 4.60857C7.79323 4.51221 7.8644 4.4272 7.95 4.35843C8.03569 4.28211 8.13621 4.22431 8.24527 4.18865C8.35433 4.15299 8.46958 4.14024 8.5838 4.15119C8.69802 4.16214 8.80875 4.19657 8.90904 4.2523C9.00934 4.30804 9.09705 4.38389 9.16667 4.4751L13.1917 9.4751C13.2963 9.62933 13.3461 9.81418 13.3333 10.0001Z"
                                fill="white" />
                        </svg>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
