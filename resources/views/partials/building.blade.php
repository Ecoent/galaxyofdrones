<div class="row">
    <div class="col-lg-6 text-center">
        <span class="item" :class="building | item('building')"></span>
    </div>
    <div class="col-lg-6">
        <h5>
            @{{ building.name_with_level }}
        </h5>
        <p>
            @{{ building.description }}
        </p>
        <div class="attribute-row">
            <div class="col-lg-6" v-if="building.defense !== null">
                <div class="attribute">
                    <h6>
                        {{ trans('validation.attributes.defense') }}
                    </h6>
                    <h5>
                        @{{ building.defense }}
                    </h5>
                    <h5 class="highlight-success" v-if="data.upgrade && data.upgrade.defense !== null">
                        @{{ data.upgrade.defense - building.defense | sign }}
                    </h5>
                </div>
            </div>
            <div class="col-lg-6" v-if="building.detection !== null">
                <div class="attribute">
                    <h6>
                        {{ trans('validation.attributes.detection') }}
                    </h6>
                    <h5>
                        @{{ building.detection }}
                    </h5>
                    <h5 class="highlight-success" v-if="data.upgrade && data.upgrade.detection !== null">
                        @{{ data.upgrade.detection - building.detection | sign }}
                    </h5>
                </div>
            </div>
            <div class="col-lg-6" v-if="building.capacity !== null">
                <div class="attribute">
                    <h6>
                        {{ trans('validation.attributes.capacity') }}
                    </h6>
                    <h5>
                        @{{ building.capacity }}
                    </h5>
                    <h5 class="highlight-success" v-if="data.upgrade && data.upgrade.capacity !== null">
                        @{{ data.upgrade.capacity - building.capacity | sign }}
                    </h5>
                </div>
            </div>
            <div class="col-lg-6" v-if="building.supply !== null">
                <div class="attribute">
                    <h6>
                        {{ trans('validation.attributes.supply') }}
                    </h6>
                    <h5>
                        @{{ building.supply }}
                    </h5>
                    <h5 class="highlight-success" v-if="data.upgrade && data.upgrade.supply !== null">
                        @{{ data.upgrade.supply - building.supply | sign }}
                    </h5>
                </div>
            </div>
            <div class="col-lg-6" v-if="building.mining_rate !== null">
                <div class="attribute">
                    <h6>
                        {{ trans('validation.attributes.mining_rate') }}
                    </h6>
                    <h5>
                        @{{ building.mining_rate }}
                    </h5>
                    <h5 class="highlight-success" v-if="data.upgrade && data.upgrade.mining_rate !== null">
                        @{{ data.upgrade.mining_rate - building.mining_rate | sign }}
                    </h5>
                </div>
            </div>
            <div class="col-lg-6" v-if="building.production_rate !== null">
                <div class="attribute">
                    <h6>
                        {{ trans('validation.attributes.production_rate') }}
                    </h6>
                    <h5>
                        @{{ building.production_rate }}
                    </h5>
                    <h5 class="highlight-success" v-if="data.upgrade && data.upgrade.production_rate !== null">
                        @{{ data.upgrade.production_rate - building.production_rate | sign }}
                    </h5>
                </div>
            </div>
            <div class="col-lg-6" v-if="building.defense_bonus !== null">
                <div class="attribute">
                    <h6>
                        {{ trans('validation.attributes.defense_bonus') }}
                    </h6>
                    <h5>
                        @{{ building.defense_bonus | percent }}
                    </h5>
                    <h5 class="highlight-success" v-if="data.upgrade && data.upgrade.defense_bonus !== null">
                        @{{ data.upgrade.defense_bonus - building.defense_bonus | percent | sign(data.upgrade.defense_bonus - building.defense_bonus) }}
                    </h5>
                </div>
            </div>
            <div class="col-lg-6" v-if="building.construction_time_bonus !== null">
                <div class="attribute">
                    <h6>
                        {{ trans('validation.attributes.construction_time_bonus') }}
                    </h6>
                    <h5>
                        @{{ building.construction_time_bonus | percent }}
                    </h5>
                    <h5 class="highlight-success" v-if="data.upgrade && data.upgrade.construction_time_bonus !== null">
                        @{{ data.upgrade.construction_time_bonus - building.construction_time_bonus | percent | sign(data.upgrade.construction_time_bonus - building.construction_time_bonus) }}
                    </h5>
                </div>
            </div>
            <div class="col-lg-6" v-if="building.trade_time_bonus !== null">
                <div class="attribute">
                    <h6>
                        {{ trans('validation.attributes.trade_time_bonus') }}
                    </h6>
                    <h5>
                        @{{ building.trade_time_bonus | percent }}
                    </h5>
                    <h5 class="highlight-success" v-if="data.upgrade && data.upgrade.trade_time_bonus !== null">
                        @{{ data.upgrade.trade_time_bonus - building.trade_time_bonus | percent | sign(data.upgrade.trade_time_bonus - building.trade_time_bonus) }}
                    </h5>
                </div>
            </div>
            <div class="col-lg-6" v-if="building.train_time_bonus !== null">
                <div class="attribute">
                    <h6>
                        {{ trans('validation.attributes.train_time_bonus') }}
                    </h6>
                    <h5>
                        @{{ building.train_time_bonus | percent }}
                    </h5>
                    <h5 class="highlight-success" v-if="data.upgrade && data.upgrade.train_time_bonus !== null">
                        @{{ data.upgrade.train_time_bonus - building.train_time_bonus | percent | sign(data.upgrade.train_time_bonus - building.train_time_bonus) }}
                    </h5>
                </div>
            </div>
        </div>
        <ul v-if="!grid.building_id || building.has_lower_level" class="list-inline">
            <li class="list-inline-item" v-popover="{placement: 'top', trigger: 'hover', content: '{{ trans('validation.attributes.construction_experience') }}'}">
                <i class="fas fa-flask"></i>
                @{{ (data.upgrade ? data.upgrade.construction_experience : building.construction_experience) | number }}
            </li>
            <li class="list-inline-item highlight-warning"
                v-popover="{placement: 'top', trigger: 'hover', content: '{{ trans('validation.attributes.construction_cost') }}'}">
                <i class="fas fa-bolt"></i>
                @{{ (data.upgrade ? data.upgrade.construction_cost : building.construction_cost) | number }}
            </li>
            <li class="list-inline-item" v-popover="{placement: 'top', trigger: 'hover', content: '{{ trans('validation.attributes.construction_time') }}'}">
                <i class="far fa-clock"></i>
                @{{ (data.upgrade ? data.upgrade.construction_time : building.construction_time) | timer }}
            </li>
        </ul>
        <div v-if="remaining" class="attribute-row">
            <div class="col-lg-6">
                <div class="form-group">
                    <button class="btn btn-warning btn-block" @click="destroy()">
                        {{ trans('messages.cancel') }}
                    </button>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <h5>
                    @{{ remaining | timer }}
                </h5>
            </div>
        </div>
        <div v-else-if="grid.building_id && building.has_lower_level" class="attribute-row">
            <div class="col-lg-6">
                <div class="form-group">
                    <button class="btn btn-success btn-block"
                            @click="store()"
                            :disabled="!canConstruct">
                        {{ trans('messages.upgrade.singular') }}
                    </button>
                </div>
            </div>
        </div>
        <div v-else-if="!grid.building_id" class="attribute-row">
            <div class="col-lg-6">
                <div class="form-group">
                    <button class="btn btn-success btn-block"
                            @click="store()"
                            :disabled="!canConstruct">
                        {{ trans('messages.construction.construct') }}
                    </button>
                </div>
            </div>
        </div>
        <div v-if="grid.building_id" class="attribute-row">
            <div class="col-lg-6">
                <div class="form-group">
                    <button class="btn btn-danger btn-block"
                            @click="openDemolish()"
                            :disabled="!canDemolish">
                        {{ trans('messages.demolish') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
