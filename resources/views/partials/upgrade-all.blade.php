<upgrade-all url="{{ route('api_upgrade_all') }}" store-url="{{ route('api_upgrade_store_all') }}" inline-template>
    <div class="upgrade-all modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        {{ trans('messages.upgrade.all') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        &times;
                    </button>
                </div>
                <div v-if="data.upgrade_cost" class="modal-body text-center">
                    <p v-if="canStore">
                        {{ trans('messages.warning.upgrade') }}
                    </p>
                    <p v-else>
                        {{ trans('messages.warning.resource') }}
                    </p>
                    <ul class="list-inline">
                        <li class="list-inline-item highlight-warning"
                            v-popover="{placement: 'top', trigger: 'hover', content: '{{ trans('messages.energy') }}'}">
                            <i class="fas fa-bolt"></i>
                            @{{ data.upgrade_cost }}
                        </li>
                        <li class="list-inline-item highlight-warning"
                            v-popover="{placement: 'top', trigger: 'hover', content: '{{ trans('messages.solarion.name') }}'}">
                            <i class="far fa-sun"></i>
                            {{ Koodilab\Models\Upgrade::SOLARION_COUNT }}
                        </li>
                    </ul>
                </div>
                <div v-else class="modal-body text-center">
                    <p v-if="data.upgrade_count">
                        {{ trans('messages.warning.upgrade_in_progress') }}
                    </p>
                    <p v-else>
                        {{ trans('messages.warning.upgraded') }}
                    </p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success"
                            type="button"
                            @click="store()"
                            :disabled="!canStore">
                        {{ trans('messages.upgrade.all') }}
                    </button>
                    <button class="btn btn-warning"
                            type="button"
                            @click="close()">
                        {{ trans('messages.cancel') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</upgrade-all>
