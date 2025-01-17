<laboratory :is-enabled="isEnabled && isSelectedTab('laboratory')"
            url="{{ route('api_research') }}"
            store-resource-url="{{ route('api_research_resource_store') }}"
            store-unit-url="{{ route('api_research_unit_store', '__unit__') }}"
            destroy-resource-url="{{ route('api_research_resource_destroy') }}"
            destroy-unit-url="{{ route('api_research_unit_destroy', '__unit__') }}" inline-template>
    <div v-if="isEnabled" class="laboratory">
        <div v-if="isEmpty" class="modal-body separator">
            <p class="text-center">
                {{ trans('messages.research.empty') }}
            </p>
        </div>
        <template v-else>
            <research v-if="data.resource"
                      :research="data.resource"
                      :is-researchable="isResearchable"
                      :store="storeResource"
                      :destroy="destroyResource" inline-template>
                <div class="modal-body separator">
                    @include('partials.resource')
                </div>
            </research>
            <research v-for="unit in data.units"
                      :key="unit.id"
                      :research="unit"
                      :is-researchable="isResearchable"
                      :store="storeUnit"
                      :destroy="destroyUnit" inline-template>
                <div class="modal-body separator">
                    @include('partials.unit')
                </div>
            </research>
        </template>
    </div>
</laboratory>
