<p> ${{number_format($revenue)}} </p>
<p class="text-sm {{($compare>= 0) ? 'text-green-500':'text-red-500';}}"> {{($compare>= 0) ? '+':'';}} {{$compare}}%
    <i class="bi bi-arrow-up-right {{($compare>= 0) ? 'inline':'hidden';}}" ></i>
    <i class="bi bi-arrow-down-right {{($compare>= 0) ? 'hidden':'inline';}}" ></i>
</p>