<template>
    <div class="card">
        <div class="card-body">
            <table class="table table-sm table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Permiso</th>
                        <th class="text-center">
                            Activo<br />
                            (<a href="#" @click="selectAll">Todos</a> |
                            <a href="#" @click="selectNone">Ningúno</a>)
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <permission
                        v-for="permission of finalPermissions"
                        :key="permission.id"
                        :permission="permission"
                        :role="role"
                    />
                </tbody>
            </table>
        </div>
        <div class="card-footer text-end">
            <a href="/catalogs/roles" class="btn btn-secondary">
                <i class="fa-solid fa-chevron-left"></i> Regresar
            </a>
            &nbsp;
            <button class="btn btn-primary" @click="save" :disabled="saving">
                <i class="fa-solid fa-floppy-disk"></i> Guardar
            </button>
        </div>
    </div>
</template>

<script>
export default {
    props: ["role", "permissions"],
    data() {
        return {
            saving: false,
            finalPermissions: this.permissions,
        };
    },
    methods: {
        selectAll() {
            this.finalPermissions = this.permissions.map((p) => {
                let tmp = p;
                tmp["selected"] = true;

                return tmp;
            });
        },
        selectNone() {
            this.finalPermissions = this.permissions.map((p) => {
                let tmp = p;
                tmp["selected"] = false;

                return tmp;
            });
        },
        save() {
            this.saving = true;

            axios
                .post("/catalogs/permissions", {
                    id: this.role.id,
                    permissions: this.permissions,
                })
                .then((res) => {
                    window.location = "/catalogs/roles";
                })
                .catch((error) => {
                    this.saving = false;
                    // this.handleError(error);
                });
        },
    },
};
</script>
