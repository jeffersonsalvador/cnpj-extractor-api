export abstract class Entity<T> {
    protected code: string
    public props: object

    protected constructor(props: object, code?: string) {
        this.props = props;
        this.code = code;
    }
}