import DataTable from 'datatables.net-dt';
import Select from 'datatables.net-select-dt';

DataTable.use(Select);

export default (Alpine) => {
    Alpine.data('datatables', ({ options = {}, errMode = 'alert' } = {}) => ({
        init() {
            DataTable.ext.errMode = errMode;

            this.table = new DataTable(this.$refs.table, options);
        },
    }));
};
