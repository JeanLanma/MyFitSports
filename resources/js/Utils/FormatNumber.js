/** return string like $9,999,99 **/
export const FormatPrice = (n) => {
    return '$' + n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}