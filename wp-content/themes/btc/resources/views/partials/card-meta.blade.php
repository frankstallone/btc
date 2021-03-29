@hasfield('employee_role')
<h3 class="font-semibold text-emeraldCity-600">@field('employee_role')</h3>
@endfield
<div class="flex flex-nowrap items-center text-emeraldCity-400 text-sm">
    <div class="space-x-2">
        @hasfield('employee_phone_number')
        <span>
            <a href="tel:+1-@field('employee_phone_number')"
                class="no-underline hover:underline text-emeraldCity-400 hover:text-emeraldCity-600 active:text-emeraldCity-600">
                <?php
                $phone = get_svg('svg.phone-flip', 'fill-current w-4 h-4 inline');
                echo $phone;
                ?>
                @field('employee_phone_number')
            </a>
        </span>
        @endfield
        @hasfield('linkedin_profile_url')
        <span>
            <a href="@field('linkedin_profile_url')"
                class="no-underline hover:underline text-emeraldCity-400 hover:text-emeraldCity-600 active:text-emeraldCity-600">
                <?php
                $linkedin = get_svg('svg.linkedin', 'fill-current w-4 h-4 inline');
                echo $linkedin;
                ?>
                LinkedIn
            </a>
        </span>
        @endfield
    </div>
</div>
