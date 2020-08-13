// Import vendor dependencies
const { __ } = wp.i18n;

// Import store dependencies
import { useStoreValue } from '../../store';
import { getLocaleCurrency } from '../../../utils';
import { setCountry, setState, setCurrency, fetchStateList } from '../../store/actions';

// Import components
import Card from '../../../components/card';
import ContinueButton from '../../../components/continue-button';
import SelectInput from '../../../components/select-input';
import BackgroundImage from './background';
import DismissLink from '../../../components/dismiss-link';

// Import styles
import './style.scss';

const Location = () => {
	const [ { configuration, currenciesList, statesList, fetchingStatesList, countriesList }, dispatch ] = useStoreValue();

	const country = configuration.country;
	const state = configuration.state;
	const currency = configuration.currency;

	const onChangeCountry = ( value ) => {
		dispatch( fetchStateList( value, dispatch ) );
		dispatch( setCountry( value ) );
		dispatch( setCurrency( getLocaleCurrency( value ) ) );
	};

	return (
		<div className="give-obw-location">
			<BackgroundImage />
			<h1>{ __( 'Where are you fundraising?', 'give' ) }</h1>
			<Card>
				<SelectInput label={ __( 'Country', 'give' ) } value={ country } onChange={ onChangeCountry } options={ countriesList } />
				<SelectInput label={ __( 'State / Province', 'give' ) } value={ state } onChange={ ( value ) => dispatch( setState( value ) ) } options={ statesList } isLoading={ fetchingStatesList } />
				<SelectInput label={ __( 'Currency', 'give' ) } value={ currency } onChange={ ( value ) => dispatch( setCurrency( value ) ) } options={ currenciesList } />
			</Card>
			<ContinueButton />
			<DismissLink />
		</div>
	);
};

export default Location;
