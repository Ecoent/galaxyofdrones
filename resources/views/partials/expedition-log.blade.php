<completion-log :is-enabled="isEnabled && isSelectedTab('expedition-log')"
                url="{{ route('api_expedition_log') }}" inline-template>
    <div v-if="isEnabled" class="expedition-log">
        <div v-if="isEmpty" class="modal-body separator">
            <p class="text-center">
                {{ trans('messages.expedition_log.empty') }}
            </p>
        </div>
        <template v-else>
            <div v-for="expedition_log in data.data" class="modal-body separator">
                <div class="row">
                    <div class="col-lg-6 text-center text-lg-left">
                        <span class="item item-sm star">
                            @{{ expedition_log.star }}
                        </span>
                        <span v-for="unit in expedition_log.units"
                              class="item item-sm"
                              :class="unit | item('unit')"
                              v-popover="{placement: 'top', trigger: 'hover', title: unit.name, content: unit.quantity}">
                            @{{ unit.quantity | number }}
                        </span>
                    </div>
                    <div class="col-lg-2 pt-lg-2 text-center">
                        <h5>
                            <i class="far fa-clock"></i>
                        </h5>
                        <h5>
                            @{{ expedition_log.created_at | fromNow }}
                        </h5>
                    </div>
                    <div class="col-lg-2 pt-lg-2 text-center">
                        <h5>
                            <i class="fas fa-flask"></i>
                        </h5>
                        <h5>
                            @{{ expedition_log.experience | number }}
                        </h5>
                    </div>
                    <div class="col-lg-2 pt-lg-2 text-center highlight-warning">
                        <h5>
                            <i class="far fa-sun"></i>
                        </h5>
                        <h5>
                            @{{ expedition_log.solarion | number }}
                        </h5>
                    </div>
                </div>
            </div>

            @include('partials.pager')
        </template>
    </div>
</completion-log>
