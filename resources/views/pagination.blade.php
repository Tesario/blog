  @if ($paginator->hasPages())
      <ul class="pagination">
          @if (!$paginator->onFirstPage())
              <li><a id="previousPage" href="#" rel="prev" onclick="event.preventDefault()"
                      wire:click="previousPage">Prev</a></li>
          @endif
          @foreach ($elements as $element)
              <div class="numbers">
                  @if (is_array($element))
                      @foreach ($element as $page => $url)
                          @if ($page == $paginator->currentPage())
                              <li class="current"><a wire:click="gotoPage({{ $page }})" href="#"
                                      onclick="event.preventDefault()">{{ $page }}</a></li>
                          @else
                              <li><a wire:click="gotoPage({{ $page }})" href="#"
                                      onclick="event.preventDefault()">{{ $page }}</a></li>
                          @endif
                      @endforeach
                  @endif
              </div>
          @endforeach

          @if ($paginator->hasMorePages())
              <li><a id="nextPage" href="#" rel="next" onclick="event.preventDefault()" wire:click="nextPage">Next</a>
              </li>
          @endif
      </ul>
  @endif
