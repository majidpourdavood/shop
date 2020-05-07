<li class="list-inline-item col">
    <button type="button"
            class="btn btn_calendar">
                            <span><i class="fa fa-calendar-alt"></i><span>
                                {{ convert(jdate(Carbon\Carbon::now())->format('%A, %d %B %y'))}}
                                </span></span>
    </button>
    <button type="button"
            class="btn btn_calendar">
                        <span><i class="fa fa-clock"></i><span>
                               {{ convert(jdate(Carbon\Carbon::now())->format('H:i:s') )}}
                            </span></span>
    </button>
</li>