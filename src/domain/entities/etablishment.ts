import {Entity} from '../../core/domain/Entity'

type EstablishmentProps = {
    basicCNPJ: string;
    fantasyName: string;
}

export class Establishment extends Entity<EstablishmentProps> {
    private constructor(props: EstablishmentProps, code?: string) {
        super(props, code);
    }
}